@extends('cms.parent');

@section('tittle' , 'medical-history')

@section('main-tittle' , 'index medical-history')
@section('sub-tittle' , 'Data of medical-history')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{route('create.med.history', $id)}}" type="submit" class="btn btn-success">create new medical-history</a>


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
                <th>x-ray</th>
                <th>Report</th>
                <th>prescription</th>
                <th>created-at</th>
                <th>updated-at</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $medicalhistories as $medicalhistory )

                <tr>
                    <td>{{ $medicalhistory->id }}</td>
                    <td>{{ $medicalhistory->xray }}</td>
                    <td>{{ $medicalhistory->report}}</td>
                    <td>{{ $medicalhistory->prescription }}</td>
                    <td>{{ $medicalhistory->created_at }}</td>
                    <td>{{ $medicalhistory->updated_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('medical-histories.edit', $medicalhistory->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $medicalhistory->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $medicalhistories->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/medical-histories/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

