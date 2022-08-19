@extends('cms.parent');

@section('tittle' , 'create new room')

@section('main-tittle' , 'create room')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create room </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="room_name">room_name</label>
          <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Enter room">
        </div>


      <div class="card-footer">
        <a href="{{ route('rooms.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('room_name' ,document.getElementById('room_name').value );

   store('/cms/rooms',formData);


  }

</script>

@endsection





