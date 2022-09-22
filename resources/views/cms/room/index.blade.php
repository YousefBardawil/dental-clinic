@extends('cms.parent');

@section('tittle' , 'room')

@section('main-tittle' , 'index room')
@section('sub-tittle' , 'Data of room')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <form action="" method="get" style="margin-bottom:2%;">
             <div class="row">

               <div class="input-icon col-md-3">
                   <input type="text" class="form-control" placeholder="Search By name" name="room_name"
                   @if(request()->room_name)
                     value={{ request()->room_name}}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>

               </div>
               <div class="col-md-5">
                   <button class="btn btn-danger btn-md" type="submit">Filter</button>
                   <a href="{{route('rooms.index')}}" type="button" class="btn btn-info">End Search</a>
                 @can('Create-Room')
                 <a href="{{ route('rooms.create') }}" type="button"  class="btn btn-success">Create Room</a>
                 @endcan
                 <a href="{{ route('download.pdf') }}" type="button" class="btn btn-info">Download pdf</a>
                 </div>




             </div>

               </form>

             </div>
       </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>room_name</th>
                <th>created date</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $rooms as $room )

                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->room_name }}</td>
                    <td>{{ $room->created_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('rooms.edit' , $room->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $room->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $rooms->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/rooms/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

