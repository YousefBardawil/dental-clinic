@extends('cms.parent');

@section('tittle' , 'opening-hours')

@section('main-tittle' , 'index opening-hours')
@section('sub-tittle' , 'Data of opening-hours')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{route('create.opening.hours', $id)}}" type="submit" class="btn btn-success">create new opening-hours</a>


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
                <th>day</th>
                <th>opening-at</th>
                <th>closing-at</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $openinghours as $openinghour )

                <tr>
                    <td>{{ $openinghour->id }}</td>
                    <td>{{ $openinghour->day }}</td>
                    <td>{{ $openinghour->opening_at}}</td>
                    <td>{{ $openinghour->closing_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('opening-hours.edit', $openinghour->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $openinghour->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $openinghours->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/opening-hours/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

