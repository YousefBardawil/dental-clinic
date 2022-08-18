@extends('cms.parent');

@section('tittle' , 'city')

@section('main-tittle' , 'index city')
@section('sub-tittle' , 'Data of city')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('cities.create') }}" type="submit" class="btn btn-success">create new city</a>


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
                <th>city_name</th>
                <th>city-code</th>
                <th>created date</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $cities as $city )

                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->city_name }}</td>
                    <td>{{ $city->code }}</td>
                    <td>{{ $city->created_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('cities.edit' , $city->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $city->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $cities->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/cities/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

