@extends('cms.parent');

@section('tittle' , 'opening-hours')

@section('main-tittle' , 'index opening-hours')
@section('sub-tittle' , 'Data of opening-hours')

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
                   <input type="text" class="form-control" placeholder="Search By Dentist-Name" name="search"
                   @if(request()->search)
                     value={{ request()->search}}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>

               </div>

               <div class="col-md-5">
                   <button class="btn btn-danger btn-md" type="submit">Filter</button>
                   <a href="{{route('opening-hours.index')}}" type="button" class="btn btn-info">End Search</a>
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
                <th>Dentist-name</th>
                <th>day</th>
                <th>opening-at</th>
                <th>closing-at</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $openinghours as $openinghour )

                <tr>
                    <td>{{ $openinghour->id }}</td>
                    <td>{{ $openinghour->dentist->name }}</td>
                    <td>{{ $openinghour->day }}</td>
                    <td>{{ $openinghour->opening_at}}</td>
                    <td>{{ $openinghour->closing_at }}</td>
                    <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $openinghours->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/opening-hours/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

