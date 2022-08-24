@extends('cms.parent');

@section('tittle' , 'create new admin')

@section('main-tittle' , 'create admin')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create admin </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">admin_name</label>
          <input type="text" class="form-control" id="name" name="ame" placeholder="Enter admin">
        </div>
        <div class="form-group">
          <label for="email">email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('admins.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('name' ,document.getElementById('name').value );
   formData.append('email' ,document.getElementById('email').value );
   formData.append('password' ,document.getElementById('password').value );


   store('/cms/admins',formData);


  }

</script>

@endsection





