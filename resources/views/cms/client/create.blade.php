@extends('cms.parent');

@section('tittle' , 'create new client')

@section('main-tittle' , 'create client')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create client </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
           <div class="row">
            <div class="form-group col-md-4">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
              </div>

                <div class="form-group col-md-4">
                  <label for="mobile ">Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number">
                </div>
                <div class="form-group col-md-4">
                    <label for="age">age</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter your Age">
                  </div>
           </div>
             <div class="row">
                <div class="form-group col-md-4">
                    <label for="date_of_birth">Date_of_Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="">
                  </div>
                   <div class="form-group col-md-4">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                  </div> <div class="form-group">
                    <label for="client_name col-md-4">password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                  </div>
             </div>



          <div class="row">
            <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <select class="form-control select2" name="gender" id="gender"  style="width: 100%;">
                  <option value="male">male</option>
                  <option value="female">female</option>
                </select>
              </div>

              <div class="form-group col-md-4">
                  <label for="status">Status</label>
                  <select class="form-control select2" name="status" id="status"  style="width: 100%;">
                    <option value="single">single</option>
                    <option value="married">married</option>
                  </select>
                </div>



            <div class="form-group col-md-4">
              <label for="">city</label>
              <select class="form-control select2" name="city_id" style="width: 100%;" id="city_id">

                     @foreach ($cities as $city )
                     <option value="{{ $city->id }}"> {{ $city->city_name }} </option>
                     @endforeach
              </select>
            </div>
          </div>



      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('clients.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

$('.city_id').select2({
    theme:'bootstrap4'
  })

  function performStore(){
    let formData = new FormData;
   formData.append('name' ,document.getElementById('name').value );
   formData.append('mobile' ,document.getElementById('mobile').value );
   formData.append('date_of_birth' ,document.getElementById('date_of_birth').value );
   formData.append('email' ,document.getElementById('email').value );
   formData.append('password' ,document.getElementById('password').value );
   formData.append('gender' ,document.getElementById('gender').value );
   formData.append('age' ,document.getElementById('age').value );
   formData.append('city_id' ,document.getElementById('city_id').value );
   formData.append('status' ,document.getElementById('status').value );

   store('/cms/clients',formData);


  }




</script>

@endsection





