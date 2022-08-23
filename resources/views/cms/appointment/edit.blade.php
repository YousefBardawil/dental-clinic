@extends('cms.parent');

@section('tittle' , 'edit new appointment')

@section('main-tittle' , 'edit appointment')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit appointment </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
           <div class="row">
            <input type="text" name="client_id" id="client_id" value="{{$appointments->client->id}}"
            class="form-control form-control-solid" hidden/>



                <div class="form-group col-md-4">
                    <label for="date">date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $appointments->date }}" placeholder="">
                  </div>
           </div>
             <div class="row">
                <div class="form-group col-md-4">
                    <label for="time">time</label>
                    <input type="time" class="form-control" id="time" name="time" value="{{ $appointments->time }}" placeholder="">
                  </div>

             </div>



          <div class="row">

            <div class="form-group col-md-4">
              <label for="">dentist</label>
              <select class="form-control select2" name="dentist_id" style="width: 100%;" id="dentist_id">
                <option selected value="{{ $appointments->dentist->id }}">{{ $appointments->dentist->name }}</option>

                     @foreach ($dentists as $dentist )
                     <option value="{{ $dentist->id }}"> {{ $dentist->name }} </option>
                     @endforeach
              </select>
            </div>

              <div class="form-group col-md-4">
                <label for="">service</label>
                <select class="form-control select2" name="service_id" style="width: 100%;" id="service_id">
                    <option value="{{ $appointments->service->id }}" selected>{{ $appointments->service->service_name }}</option>
                       @foreach ($services as $service )
                       <option value="{{ $service->id }}"> {{ $service->service_name }} </option>
                       @endforeach
                </select>
              </div>

              <div class="form-group col-md-4">
                <label for="">room</label>
                <select class="form-control select2" name="room_id" style="width: 100%;" id="room_id">
                    <option value="{{ $appointments->room->id }}" selected>{{ $appointments->room->room_name }}</option>
                       @foreach ($rooms as $room )
                       <option value="{{ $room->id }}"> {{ $room->room_name }} </option>
                       @endforeach
                </select>
              </div>





      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('index.appointments', $appointments->client->id) }}" type="submit" class="btn btn-success">Index </a>
        <button onclick="performUpdate({{ $appointments->id}})" type="button" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

$('.city_id').select2({
    theme:'bootstrap4'
  })

  function performUpdate(id){
    let formData = new FormData;
   formData.append('time' ,document.getElementById('time').value );
   formData.append('date' ,document.getElementById('date').value );
   formData.append('dentist_id' ,document.getElementById('dentist_id').value );
   formData.append('client_id' ,document.getElementById('client_id').value );
   formData.append('service_id' ,document.getElementById('service_id').value );
   formData.append('room_id' ,document.getElementById('room_id').value );

   store('/cms/appointments_update/'+id,formData);


  }




</script>

@endsection





