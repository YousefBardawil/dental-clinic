@extends('cms.parent');

@section('tittle' , 'review')

@section('main-tittle' , 'index review')
@section('sub-tittle' , 'Data of review')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('create.reviews', $id) }}" type="submit" class="btn btn-success">create new review</a>


          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>client-name</th>
                <th>Image</th>
                <th>comment</th>
                <th>created date</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $reviews as $review )

                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->client->name }}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/client/'. $review->client->image)  }}" width="50" alt="">
                    </td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->created_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('reviews.edit' , $review->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $review->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $reviews->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/reviews/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

