@extends('cms.parent');

@section('tittle' , 'edit new city')

@section('main-tittle' , 'edit city')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of city </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="city_name">city_name</label>
          <input type="text" class="form-control" id="city_name" name="city_name" value="{{ $cities->city_name }}" placeholder="">
        </div>
        <div class="form-group">
          <label for="code">code of the city</label>
          <input type="text" class="form-control" id="code" name="code" value="{{ $cities->code }}" placeholder="">
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $cities->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('city_name' ,document.getElementById('city_name').value );
   formData.append('code' ,document.getElementById('code').value );

   storeRoute('/cms/cities_update/'+id ,formData);

  }

</script>
@endsection





