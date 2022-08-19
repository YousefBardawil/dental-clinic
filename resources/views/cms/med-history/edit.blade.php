@extends('cms.parent');

@section('tittle' , 'edit new medical-history')

@section('main-tittle' , 'create medical-history')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create medical-history </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">

          <input type="text" name="client_id" id="client_id" value="{{$medicalhistories->client->id}}"
                    class="form-control form-control-solid" hidden/>


        <div class="form-group col-md-6">
          <label for="xray">x-ray</label>
          <input type="file" class="form-control" id="xray" name="xray" placeholder="Enter X-ray">
        </div>
        <div class="form-group col-md-6">
            <label for="report">Report</label>
                <input type="file" class="form_control" id="report" name="report" placeholder="Enter Report">
          </div>
          <div class="form-group col-md-6">
            <label for="prescription">Prescription</label>
                <input type="file" class="form_control" id="prescription" name="prescription" placeholder="Enter Prescription">
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('medical-histories.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performUpdate({{  $medicalhistories->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performUpdate(id){
    let formData = new FormData;
    formData.append('xray' ,document.getElementById('xray').files[0]);
    formData.append('report' ,document.getElementById('report').files[0]);
    formData.append('prescription' ,document.getElementById('prescription').files[0]);
    formData.append('client_id' ,document.getElementById('client_id').value);



    storeRoute('/cms/medical-histories_update/'+id,formData);


  }

</script>

@endsection





