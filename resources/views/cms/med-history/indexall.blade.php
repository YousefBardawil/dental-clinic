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
                <th>Client_name</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $medicalhistories as $medicalhistory )

                <tr>
                    <td>{{ $medicalhistory->id }}</td>
                    <td>{{ $medicalhistory->client->name }}</td>
                    <td>
                        <div class="btn-group">
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


@endsection

