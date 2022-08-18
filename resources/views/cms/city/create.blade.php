@extends('cms.parent');

@section('tittle' , 'create new city')

@section('main-tittle' , 'create city')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create city </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="city_name">city_name</label>
          <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Enter city">
        </div>
        <div class="form-group">
          <label for="code">code number</label>
          <input type="text" class="form-control" id="code" name="code" placeholder="Enter city code">
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('cities.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('city_name' ,document.getElementById('city_name').value );
   formData.append('code' ,document.getElementById('code').value );

   store('/cms/cities',formData);


  }

</script>

@endsection





