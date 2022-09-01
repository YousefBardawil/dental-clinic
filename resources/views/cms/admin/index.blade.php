@extends('cms.parent');

@section('tittle' , 'Admin')

@section('main-tittle' , 'index Admin')
@section('sub-tittle' , 'Data of Admin')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">

      <div class="card">

        <div class="card-header">


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
                    <a href="{{route('admins.index')}}" type="button" class="btn btn-info">End Search</a>
                  @can('Create-Admin')
                  <a href="{{ route('admins.create') }}" type="button"  class="btn btn-success">Create Admin</a>
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
                <th>Admin_name</th>
                <th>Email</th>
                <th>Image</th>
                <th>created date</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $admins as $Admin )

                <tr>
                    <td>{{ $Admin->id }}</td>
                    <td>{{ $Admin->name }}</td>
                    <td>{{ $Admin->email }}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/admin/'. $Admin->image)  }}" width="50" alt="">
                    </td>
                    <td>{{ $Admin->created_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('admins.edit' , $Admin->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $Admin->id}},this)" type="button" class="btn btn-danger">Delete</a>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $admins->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admins/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

