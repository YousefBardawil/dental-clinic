@extends('cms.parent');

@section('tittle' , 'create new service')

@section('main-tittle' , 'create service')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create service </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="service_name">service_name</label>
          <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Enter service">
        </div>
        <div class="form-group">
            <label for="Price">service_price</label>
            <input type="float" class="form-control" id="price" name="price" placeholder="Enter service price">
          </div>
        <div class="form-group">
            <div>  <label for="description">Description</label>  </div>
          <textarea name="description" style="resize: none;" id="description"  rows="5" cols="40"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="image">Image</label>
            <input type="file" class="form_control" id="image" name="image" placeholder="Enter image">

          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('services.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('service_name' ,document.getElementById('service_name').value );
   formData.append('description' ,document.getElementById('description').value );
   formData.append('price' ,document.getElementById('price').value );
   formData.append('image' ,document.getElementById('image').files[0]);


   store('/cms/services',formData);


  }

</script>

@endsection





