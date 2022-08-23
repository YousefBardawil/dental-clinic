@extends('cms.parent');

@section('tittle' , 'appointment')

@section('main-tittle' , 'index appointment')
@section('sub-tittle' , 'Data of appointment')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{route('create.appointments', $id)}}" type="submit" class="btn btn-success">create new appointment</a>


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
                <th>client-name</th>
                <th>email</th>
                <th>dentist-name</th>
                <th>service</th>
                <th>room</th>
                <th>time</th>
                <th>settings</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $appointments as $appointment )

                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->client->name }}</td>
                    <td>{{ $appointment->client->email }}</td>
                    <td>{{ $appointment->dentist->name }}</td>
                    <td>{{ $appointment->service->service_name}}</td>
                    <td>{{ $appointment->room->room_name}}</td>
                    <td>{{ $appointment->date}}</td>
                    <td>{{ $appointment->time}}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('appointments.edit' , $appointment->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $appointment->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <a href="{{ route('appointments.show' , $appointment->id) }}" type="button" class="btn btn-success">show</a>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>



        {{ $appointments->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/appointments/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

