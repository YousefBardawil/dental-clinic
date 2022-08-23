@extends('cms.parent');

@section('tittle' , 'create new appointment')

@section('main-tittle' , 'create appointment')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create appointment </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
           <div class="row">
            <input type="text" name="client_id" id="client_id" value="{{$id}}"
                    class="form-control form-control-solid" hidden/>


                <div class="form-group col-md-4">
                    <label for="date">date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter  date">
                  </div>
           </div>
             <div class="row">
                <div class="form-group col-md-4">
                    <label for="time">time</label>
                    <input type="time" class="form-control" id="time" name="time" placeholder="">
                  </div>
                   {{-- <div class="form-group col-md-4">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                  </div> --}}
             </div>



          <div class="row">

            <div class="form-group col-md-4">
              <label for="">dentist</label>
              <select class="form-control select2" name="dentist_id" style="width: 100%;" id="dentist_id">
                     @foreach ($dentists as $dentist )
                     <option value="{{ $dentist->id }}"> {{ $dentist->name }} </option>
                     @endforeach
              </select>
            </div>
            {{-- <div class="form-group col-md-4">
                <label for="">client</label>
                <select class="form-control select2" name="client_id" style="width: 100%;" id="client_id">
                       @foreach ($clients as $client )
                       <option value="{{ $client->id }}"> {{ $client->name }} </option>
                       @endforeach
                </select>
              </div> --}}

              <div class="form-group col-md-4">
                <label for="">service</label>
                <select class="form-control select2" name="service_id" style="width: 100%;" id="service_id">
                       @foreach ($services as $service )
                       <option value="{{ $service->id }}"> {{ $service->service_name }} </option>
                       @endforeach
                </select>
              </div>

              <div class="form-group col-md-4">
                <label for="">room</label>
                <select class="form-control select2" name="room_id" style="width: 100%;" id="room_id">
                       @foreach ($rooms as $room )
                       <option value="{{ $room->id }}"> {{ $room->room_name }} </option>
                       @endforeach
                </select>
              </div>





      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('index.appointments', $id) }}" type="submit" class="btn btn-success">Index </a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

$('.room_id').select2({
    theme:'bootstrap4'
  })
  $('.service_id').select2({
    theme:'bootstrap4'
  })

  $('.dentist_id').select2({
    theme:'bootstrap4'
  })


  function performStore(){
    let formData = new FormData;
//    formData.append('name' ,document.getElementById('name').value );
   formData.append('time' ,document.getElementById('time').value );
//    formData.append('email' ,document.getElementById('email').value );
   formData.append('date' ,document.getElementById('date').value );
   formData.append('dentist_id' ,document.getElementById('dentist_id').value );
   formData.append('client_id' ,document.getElementById('client_id').value );
   formData.append('service_id' ,document.getElementById('service_id').value );
   formData.append('room_id' ,document.getElementById('room_id').value );

   store('/cms/appointments',formData);


  }




</script>

@endsection





