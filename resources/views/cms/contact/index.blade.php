@extends('cms.parent');

@section('tittle' , 'contact')

@section('main-tittle' , 'index contact')
@section('sub-tittle' , 'Data of contact')

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
                   <input type="email" class="form-control" placeholder="Search By Email" name="email"
                   @if(request()->email)
                     value={{ request()->email }}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>
               </div>

               <div class="input-icon col-md-3">
                   <input type="text" class="form-control" placeholder="Search By name" name="name"
                   @if(request()->name)
                     value={{ request()->name}}
                   @endif>
                   <span>
                       <i class="flaticon2-search-1 text-muted"></i>

                   </span>

               </div>
               <div class="col-md-5">
                   <button class="btn btn-danger btn-md" type="submit">Filter</button>
                   <a href="{{route('contacts.index')}}" type="button" class="btn btn-info">End Search</a>

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
                <th>name</th>
                <th>email</th>
                <th>title</th>
                <th>created date</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $contacts as $contact )

                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->title }}</td>
                    <td>{{ $contact->created_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a type="button" href="{{ route('contacts.show' , $contact->id) }}" class="btn btn-success">show</a>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $contacts->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

@endsection

