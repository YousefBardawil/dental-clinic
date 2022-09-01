@extends('cms.parent');

@section('tittle' , 'service')

@section('main-tittle' , 'index service')
@section('sub-tittle' , 'Data of service')

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
                   <input type="text" class="form-control" placeholder="Search By name" name="service_name"
                   @if(request()->service_name)
                     value={{ request()->service_name}}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>

               </div>
               <div class="col-md-5">
                   <button class="btn btn-danger btn-md" type="submit">Filter</button>
                   <a href="{{route('services.index')}}" type="button" class="btn btn-info">End Search</a>
                 @can('Create-Service')
                 <a href="{{ route('services.create') }}" type="button"  class="btn btn-success">Create Service</a>
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
                <th>service_name</th>
                <th>Description</th>
                <th>price</th>
                <th>Image</th>
                <th>created date</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $services as $service )

                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->price }}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/service/'. $service->image)  }}" width="50" alt="">
                    </td>
                    <td>{{ $service->created_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('services.edit' , $service->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $service->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $services->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/services/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

