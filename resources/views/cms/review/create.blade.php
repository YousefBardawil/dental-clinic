@extends('cms.parent');

@section('tittle' , 'create new review')

@section('main-tittle' , 'create review')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create review </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>

      <div class="card-body">
        <input type="text" name="client_id" id="client_id" value="{{$id}}"
        class="form-control form-control-solid" hidden/>

        <div class="form-group">
            <div><label for="comment">comment</label></div>
             <textarea name="comment" id="comment" cols="40" rows="5" style="resize: none;" > {{ $reviews->comment }}</textarea>

           </div>


      <div class="card-footer">
        <a href="{{ route('index.reviews', $id) }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('comment' ,document.getElementById('comment').value );
   formData.append('client_id' ,document.getElementById('client_id').value );

   store('/cms/reviews',formData);


  }

</script>

@endsection





