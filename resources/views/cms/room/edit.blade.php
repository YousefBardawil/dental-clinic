@extends('cms.parent');

@section('tittle' , 'edit new room')

@section('main-tittle' , 'edit room')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of room </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="room_name">room_name</label>
          <input type="text" class="form-control" id="room_name" name="room_name" value="{{ $rooms->room_name }}" placeholder="">
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $rooms->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('room_name' ,document.getElementById('room_name').value );


   storeRoute('/cms/rooms_update/'+id ,formData);

  }

</script>
@endsection





