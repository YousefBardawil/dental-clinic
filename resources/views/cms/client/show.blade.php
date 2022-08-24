@extends('cms.parent');

@section('tittle' , 'client details')

@section('main-tittle' , 'client')
@section('sub-tittle' , 'client')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"> Client Details </h3>
    </div>
    <!-- /.card-header -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/client/'. $clients->image)  }}" alt="User profile picture">
              </div>

            <h3 class="profile-username text-center">{{ $clients->name }}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{ $clients->email }}</a>
              </li>
              <li class="list-group-item">
                <b>Gender</b> <a class="float-right">{{ $clients->user->gender }}</a>
              </li>
              <li class="list-group-item">
                <b>Mobile</b> <a class="float-right">{{ $clients->user->mobile }}</a>
              </li>
              <li class="list-group-item">
                <b>Age</b> <a class="float-right">{{ $clients->user->age }}</a>
              </li>
              <li class="list-group-item">
                <b>City</b> <a class="float-right">  {{ $clients->user->city->city_name }}</a>
              </li>
              <li class="list-group-item">
                <b>Status</b> <a class="float-right">  {{ $clients->user->status }}</a>
              </li>

            </ul>

          </div>

    </div>






    <div class="card-footer">
        <a href="{{ route('clients.index') }}" type="submit" class="btn btn-success">Index page</a>
        </div>
  </div>



@endsection

@section('scripts')



@endsection





