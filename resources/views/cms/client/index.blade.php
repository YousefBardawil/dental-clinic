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
            <a href="{{ route('clients.create') }}" type="submit" class="btn btn-success">create new client</a>


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
                <th>name</th>
                <th>mobile</th>
                <th>Gender</th>
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

