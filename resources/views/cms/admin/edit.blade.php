@extends('cms.parent');

@section('tittle' , 'edit new admin')

@section('main-tittle' , 'edit admin')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of admin </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">admin_name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $admins->name }}" placeholder="">
        </div>
        <div class="form-group">
          <label for="email">code of the admin</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $admins->email }}" placeholder="">
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $admins->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('name' ,document.getElementById('name').value );
   formData.append('email' ,document.getElementById('email').value );

   storeRoute('/cms/admins_update/'+id ,formData);

  }

</script>
@endsection





