@extends('cms.parent');

@section('tittle' , 'city')

@section('main-tittle' , 'index city')
@section('sub-tittle' , 'Data of city')

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
                   <input type="text" class="form-control" placeholder="Search By name" name="city_name"
                   @if(request()->city_name)
                     value={{ request()->city_name}}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>

               </div>
               <div class="col-md-5">
                   <button class="btn btn-danger btn-md" type="submit">Filter</button>
                   <a href="{{route('cities.index')}}" type="button" class="btn btn-info">End Search</a>
                 @can('Create-City')
                 <a href="{{ route('cities.create') }}" type="button"  class="btn btn-success">Create City</a>
                 @endcan

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
                <th>city_name</th>
                <th>city-code</th>
                <th>created date</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $cities as $city )

                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->city_name }}</td>
                    <td>{{ $city->code }}</td>
                    <td>{{ $city->created_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('cities.edit' , $city->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $city->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $cities->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/cities/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

