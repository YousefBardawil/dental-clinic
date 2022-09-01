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
        {{-- <div class="card-header">
            <form action="" method="get" style="margin-bottom:2%;">
             <div class="row">

               <div class="input-icon col-md-3">
                   <input type="text" class="form-control" placeholder="Search By name" name="client_id"
                   @if(request()->name)
                     value={{ request()->appointment->client->name}}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>

               </div>
               <div class="col-md-5">
                   <button class="btn btn-danger btn-md" type="submit">Filter</button>
                   <a href="{{route('appointments.index')}}" type="button" class="btn btn-info">End Search</a>
                 </div>

             </div>

               </form>

             </div>
       </div> --}}
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
                    <td>{{ $appointment->time}}</td>
                    <td>
                        <div class="btn-group">
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

