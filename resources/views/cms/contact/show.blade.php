@extends('cms.parent');

@section('tittle' , 'show new contact')

@section('main-tittle' , 'show contact')
@section('sub-tittle' , 'show')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">show contact message </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">name</label>
          <input type="text" class="form-control" value="{{ $contacts->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" value="{{ $contacts->email }}" disabled>
          </div>
          <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" value="{{ $contacts->message }}" disabled>
          </div>
          <div class="form-group">
            <label for="message">message</label>
            <textarea name="message" id="message" cols="30" rows="10"  disabled>{{ $contacts->message }}</textarea>
          </div>


      <div class="card-footer">
        <a href="{{ route('contacts.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button  type="button" class="btn btn-primary">answer</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')


 

@endsection





