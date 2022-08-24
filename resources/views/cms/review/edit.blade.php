@extends('cms.parent');

@section('tittle' , 'edit new review')

@section('main-tittle' , 'edit review')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit review </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>

      <div class="card-body">
        <input type="text" name="client_id" id="client_id" value="{{$reviews->client->id}}"
        class="form-control form-control-solid" hidden/>

        <div class="form-group">
         <div><label for="comment">comment</label></div>
          <textarea name="comment" id="comment" cols="40" rows="5" style="resize: none;" > {{ $reviews->comment }}</textarea>

        </div>


      <div class="card-footer">
        <a href="{{ route('index.reviews', $reviews->client->id) }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performUpdate({{ $reviews->id }})" type="button" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performUpdate(id){
    let formData = new FormData;
   formData.append('comment' ,document.getElementById('comment').value );
   formData.append('client_id' ,document.getElementById('client_id').value );

   storeRoute('/cms/reviews_update/'+id,formData);


  }

</script>

@endsection





