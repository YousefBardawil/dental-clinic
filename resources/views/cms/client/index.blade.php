@extends('cms.parent');

@section('tittle' , 'client')

@section('main-tittle' , 'index client')
@section('sub-tittle' , 'Data of client')

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
                   <a href="{{route('clients.index')}}" type="button" class="btn btn-info">End Search</a>
                 @can('Create-Client')
                 <a href="{{ route('clients.create') }}" type="button"  class="btn btn-success">Create Client</a>
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
                <th>Gender</th>
                <th>add medical-file</th>
                <th>appointments</th>
                <th>review</th>
                <th>Image</th>
                <th>settings</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $clients as $client )

                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->user->mobile}}</td>
                    <td>{{ $client->user->gender }}</td>
                    <td><a href="{{route('index.med.history',['id'=>$client->id])}}"
                        class="btn btn-info">({{$client->medicalhistories_count}})
                        file/s</a>
                    </td>

                     <td><a href="{{route('index.appointments',['id'=>$client->id])}}"
                        class="btn btn-info">({{$client->appointments_count}})
                        appointment/s</a>
                     </td>
                     <td><a href="{{route('index.reviews',['id'=>$client->id])}}"
                        class="btn btn-info">({{$client->reviews_count}})
                        review/s</a>
                     </td>
                     <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/client/'. $client->image)  }}" width="50" alt="">
                    </td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('clients.edit' , $client->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $client->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <a href="{{ route('clients.show' , $client->id) }}" type="button" class="btn btn-success">show</a>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>



        {{ $clients->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/clients/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

