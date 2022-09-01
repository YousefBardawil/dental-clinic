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
            <a href="{{ route('admins.create') }}" type="submit" class="btn btn-success">create new Admin</a>


          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
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

