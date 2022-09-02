@extends('cms.parent');

@section('tittle' , 'edit new payment')

@section('main-tittle' , 'edit payment')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit payment </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <input type="text" name="client_id" id="client_id" value="{{$payments->client->id}}"
        class="form-control form-control-solid" hidden/>

        <div class="form-group">
          <label for="total_balance">total_balance</label>
          <input type="number" class="form-control" id="total_balance" name="total_balance" value="{{ $payments->total_balance }}">
        </div>
        <div class="form-group">
          <label for="total_receipt">total_receipt</label>
          <input type="number" class="form-control" id="total_receipt" name="total_receipt"  value="{{ $payments->total_receipt }}">
        </div>
        <div class="form-group">
          <label for="remaining_balance">remaining_balance</label>
          <input type="number" class="form-control" id="remaining_balance" name="remaining_balance"  value="{{ $payments->remaining_balance }}">
        </div>

        <div class="form-group col-md-6">
            <label for="dentist_id">Dentist</label>
            <select class="form-control select2" name="dentist_id" style="width: 100%;" id="dentist_id">
              <option selected value="{{ $payments->dentist->id }}" >{{$payments->dentist->name}} </option>
                   @foreach ($dentists as $dentist )
                   <option value="{{ $dentist->id }}"> {{ $dentist->name }} </option>
                   @endforeach
            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="service_id">Service</label>
            <select class="form-control select2" name="service_id" style="width: 100%;" id="service_id">
              <option selected value="{{ $payments->service->id }}" >{{$payments->service->service_name}} </option>
                   @foreach ($services as $service )
                   <option value="{{ $service->id }}"> {{ $service->service_name }} </option>
                   @endforeach
            </select>
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('payments.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performUpdate({{ $payments->id }})" type="button" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performUpdate(id){
    let formData = new FormData;
   formData.append('total_balance' ,document.getElementById('total_balance').value );
   formData.append('total_receipt' ,document.getElementById('total_receipt').value );
   formData.append('remaining_balance' ,document.getElementById('remaining_balance').value );
   formData.append('client_id' ,document.getElementById('client_id').value);
   formData.append('service_id' ,document.getElementById('service_id').value);
   formData.append('dentist_id' ,document.getElementById('dentist_id').value);



   storeRoute('/cms/payments_update/'+id ,formData);


  }

</script>

@endsection





