@extends('cms.parent');

@section('tittle' , 'edit new service')

@section('main-tittle' , 'edit service')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of service </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="service_name">service_name</label>
          <input type="text" class="form-control" id="service_name" name="service_name" value="{{ $services->service_name }}" placeholder="">
        </div>
        <div class="form-group">
         <div>   <label for="code">Description</label></div>
          <textarea name="description" style="resize: none;" id="description"  rows="5" cols="40">{{ $services->description }}</textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="image">Image</label>
            <input type="file" class="form_control" id="image" name="image" placeholder="Enter image">

          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $services->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
    formData.append('service_name' ,document.getElementById('service_name').value );
   formData.append('description' ,document.getElementById('description').value );
   formData.append('image' ,document.getElementById('image').files[0]);

   storeRoute('/cms/services_update/'+id ,formData);

  }

</script>
@endsection





