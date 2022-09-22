@extends('cms.parent');

@section('tittle' , 'edit new room')

@section('main-tittle' , 'edit room')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Show data of room </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label>room_name</label>
          <input type="text" class="form-control" disabled value="{{ $rooms->room_name }}" placeholder="">
        </div>
      <!-- /.card-body -->


    </form>
  </div>

@endsection

@section('scripts')


@endsection





