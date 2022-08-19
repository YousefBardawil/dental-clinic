@extends('cms.parent');

@section('tittle' , 'dentist details')

@section('main-tittle' , 'dentist')
@section('sub-tittle' , 'dentist')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"> dentist Details </h3>
    </div>
    <!-- /.card-header -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/dentist/'. $dentists->image)  }}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $dentists->name }}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{ $dentists->email }}</a>
              </li>
              <li class="list-group-item">
                <b>Gender</b> <a class="float-right">{{ $dentists->user->gender }}</a>
              </li>
              <li class="list-group-item">
                <b>Mobile</b> <a class="float-right">{{ $dentists->user->mobile }}</a>
              </li>
              <li class="list-group-item">
                <b>Age</b> <a class="float-right">{{ $dentists->user->age }}</a>
              </li>
              <li class="list-group-item">
                <b>City</b> <a class="float-right">  {{ $dentists->user->city->city_name }}</a>
              </li>
              <li class="list-group-item">
                <b>Status</b> <a class="float-right">  {{ $dentists->user->status }}</a>
              </li>

            </ul>

          </div>

    </div>






    <div class="card-footer">
        <a href="{{ route('dentists.index') }}" type="submit" class="btn btn-success">Index page</a>
        </div>
  </div>



@endsection

@section('scripts')



@endsection





