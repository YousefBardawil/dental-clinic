@extends('cms.parent');

@section('tittle' , 'payment')

@section('main-tittle' , 'index payment')
@section('sub-tittle' , 'Data of payment')

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
                   <a href="{{route('payments.index')}}" type="button" class="btn btn-info">End Search</a>
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
                <th>client_name</th>
                <th>service</th>
                <th>dentist</th>
                <th>total_balance</th>
                <th>total_receipt</th>
                <th>remaining_balance</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $payments as $payment )

                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->client->name }}</td>
                    <td>{{ $payment->service->service_name }}</td>
                    <td>{{ $payment->dentist->name }}</td>
                    <td>{{ $payment->total_balance }}</td>
                    <td>{{ $payment->total_receipt }}</td>
                    <td>{{ $payment->remaining_balance }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('payments.edit' , $payment->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $payment->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $payments->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/payments/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

