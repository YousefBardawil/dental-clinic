@extends('cms.parent');

@section('tittle' , 'dentist')

@section('main-tittle' , 'index dentist')
@section('sub-tittle' , 'Data of dentist')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <form action="" method="get" style="margin-bottom:2%;">
             <div class="row">
               <div class="input-icon col-md-3">
                   <input type="email" class="form-control" placeholder="Search By Email" name="email"
                   @if(request()->email)
                     value={{ request()->email }}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>
               </div>

               <div class="input-icon col-md-3">
                   <input type="text" class="form-control" placeholder="Search By name" name="name"
                   @if(request()->name)
                     value={{ request()->name}}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>

               </div>
               <div class="col-md-5">
                   <button class="btn btn-danger btn-md" type="submit">Filter</button>
                   <a href="{{route('dentists.index')}}" type="button" class="btn btn-info">End Search</a>
                 @can('Create-Dentist')
                 <a href="{{ route('dentists.create') }}" type="button"  class="btn btn-success">Create Dentist</a>
                 @endcan

                 </div>

             </div>

               </form>

             </div>
       </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>name</th>
                <th>mobile</th>
                <th>add opening hours</th>
                <th>Image</th>
                <th>settings</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $dentists as $dentist )

                <tr>
                    <td>{{ $dentist->id }}</td>
                    <td>{{ $dentist->name }}</td>
                    <td>{{ $dentist->user->mobile}}</td>
                    <td><a href="{{route('index.opening.hours',['id'=>$dentist->id])}}"
                        class="btn btn-info">({{$dentist->openinghours_count}})
                        day/s</a> </td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/dentist/'. $dentist->image)  }}" width="50" alt="">
                    </td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('dentists.edit' , $dentist->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $dentist->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <a href="{{ route('dentists.show' , $dentist->id) }}" type="button" class="btn btn-success">show</a>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>



        {{ $dentists->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/dentists/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

