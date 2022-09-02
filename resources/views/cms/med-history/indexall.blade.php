@extends('cms.parent');

@section('tittle' , 'medical-history')

@section('main-tittle' , 'index medical-history')
@section('sub-tittle' , 'Data of medical-history')

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
                   <input type="text" class="form-control" placeholder="Search By Client-Name" name="search"
                   @if(request()->search)
                     value={{ request()->search}}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>

               </div>

               <div class="col-md-5">
                   <button class="btn btn-danger btn-md" type="submit">Filter</button>
                   <a href="{{route('medical-histories.index')}}" type="button" class="btn btn-info">End Search</a>
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
                <th>Client_name</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $medicalhistories as $medicalhistory )

                <tr>
                    <td>{{ $medicalhistory->id }}</td>
                    <td>{{ $medicalhistory->client->name }}</td>
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

        {{ $medicalhistories->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')


@endsection

