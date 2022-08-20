@extends('cms.parent');

@section('tittle' , 'create new opening-hours')

@section('main-tittle' , 'create opening-hours')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create opening-hours </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">

          <input type="text" name="dentist_id" id="dentist_id" value="{{$id}}"
                    class="form-control form-control-solid" hidden/>


        <div class="form-group col-md-6">
          <label for="day">day</label>
          <input type="text" class="form-control" id="day" name="day" placeholder="Enter day">
        </div>
        <div class="form-group col-md-6">
            <label for="opening_at">opening_at</label>
                <input type="time" class="form_control" id="opening_at" name="opening_at" placeholder="Enter opening_at">
          </div>
          <div class="form-group col-md-6">
            <label for="closing_at">closing_at</label>
                <input type="time" class="form_control" id="closing_at" name="closing_at" placeholder="Enter closing_at">
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('index.opening.hours', $id) }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;

    formData.append('dentist_id' ,document.getElementById('dentist_id').value);
    formData.append('day' ,document.getElementById('day').value);
    formData.append('opening_at' ,document.getElementById('opening_at').value);
    formData.append('closing_at' ,document.getElementById('closing_at').value);



   store('/cms/opening-hours',formData);


  }

</script>

@endsection





