@extends('cms.parent');

@section('tittle' , 'dentist')

@section('main-tittle' , 'index dentist')
@section('sub-tittle' , 'Data of dentist')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('dentists.create') }}" type="submit" class="btn btn-success">create new dentist</a>


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
                <th>name</th>
                <th>mobile</th>
                <th>Gender</th>
                <th>Image</th>
                <th>settings</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $dentists as $dentist )

                <tr>
                    <td>{{ $dentist->id }}</td>
                    <td>{{ $dentist->name }}</td>
                    <td>{{ $dentist->user->mobile}}</td>
                    <td>{{ $dentist->user->gender }}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/dentist/'. $dentist->image)  }}" width="50" alt="">
                    </td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('dentists.edit' , $dentist->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $dentist->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <a href="{{ route('dentists.show' , $dentist->id) }}" type="button" class="btn btn-success">show</a>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>



        {{ $dentists->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/dentists/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

