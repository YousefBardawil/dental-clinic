@extends('cms.parent');

@section('tittle' , 'create new contact')

@section('main-tittle' , 'create contact')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create contact </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title" name="email" placeholder="Enter title subject">
          </div>
          <div class="form-group">
            <label for="message">message</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="enter your message"></textarea>
          </div>


      <div class="card-footer">
        <a href="{{ route('contacts.index') }}" type="submit" class="btn btn-success">Index page</a>
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
   formData.append('title' ,document.getElementById('title').value );
   formData.append('message' ,document.getElementById('message').value );

   store('/cms/contacts',formData);

  }

</script>

@endsection





