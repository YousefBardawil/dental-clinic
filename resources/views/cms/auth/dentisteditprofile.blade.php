@extends('cms.parent');

@section('tittle' , 'edit new dentist')

@section('main-tittle' , 'edit dentist')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit dentist </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
           <div class="row">
            <div class="form-group col-md-4">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name" value="{{ $dentists->name }}" name="first_name" placeholder="">
              </div>
              <div class="form-group col-md-4">
                  <label for="age">age</label>
                  <input type="text" class="form-control" id="age" value="{{ $dentists->user->age }}" name="age" placeholder="">
                </div>
                <div class="form-group col-md-4">
                  <label for="mobile ">Mobile</label>
                  <input type="text" class="form-control" id="mobile" value="{{ $dentists->user->mobile }}" name="mobile" placeholder="">
                </div>
           </div>
             <div class="row">
                <div class="form-group col-md-4">
                    <label for="date_of_birth">Date_of_Birth</label>
                    <input type="date" class="form-control" value="{{ $dentists->user->date_of_birth }}" id="date_of_birth" name="date_of_birth" placeholder="">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" value="{{ $dentists->email }}" name="email" placeholder="Enter your email">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select class="form-control select2" name="gender" id="gender"  style="width: 100%;">
                        <option selected >{{ $dentists->user->gender }}</option>
                      <option value="male">male</option>
                      <option value="female">female</option>
                    </select>
                  </div>



          <div class="row">
              <div class="form-group col-md-6">
                  <label for="status">Status</label>
                  <select class="form-control select2" name="status" id="status"  style="width: 100%;">
                    <option selected >{{ $dentists->user->status }}</option>
                    <option value="single">single</option>
                    <option value="married">married</option>
                  </select>
                </div>



            <div class="form-group col-md-6">
              <label for="">city</label>
              <select class="form-control select2" name="city_id" style="width: 100%;" id="city_id">
                <option selected value="{{$dentists->user->city->id}} " >{{$dentists->user->city->city_name}} </option>
                     @foreach ($cities as $city )
                     <option value="{{ $city->id }}"> {{ $city->city_name }} </option>
                     @endforeach
              </select>
            </div>
            
            <div class="form-group col-md-6">
                <label for="image">Image</label>
                    <input type="file" class="form_control" id="image" name="image" placeholder="Enter image">

              </div>

          </div>




      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $dentists->id }})" type="button" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>


$('.country_id').select2({
    theme:'bootstrap4'
  })

  function performUpdate(id){
    let formData = new FormData;
   formData.append('name' ,document.getElementById('name').value );
   formData.append('age' ,document.getElementById('age').value );
   formData.append('mobile' ,document.getElementById('mobile').value );
   formData.append('date_of_birth' ,document.getElementById('date_of_birth').value );
   formData.append('email' ,document.getElementById('email').value );
   formData.append('gender' ,document.getElementById('gender').value );
   formData.append('city_id' ,document.getElementById('city_id').value );
   formData.append('status' ,document.getElementById('status').value );
   formData.append('image' ,document.getElementById('image').files[0]);



  storeRoute('/cms/dentists_update/'+id ,formData);


  }




</script>

@endsection





