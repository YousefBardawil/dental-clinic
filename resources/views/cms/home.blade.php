@extends('cms.parent')
@section('tittle' , 'Home')

@section('main-tittle' , 'Home')
@section('sub-tittle' , 'Home')

@section('styles')

@endsection

@section('content')

<div class="container-fluid">
    <div class="row">

        @php
        use App\Models\Admin;
        $count = Admin::count('id');
        @endphp

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red text-center">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <h3>Admin number</h3>
                </div>
                <div class="icon">

                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('admins.index')}}" class="small-box-footer"> read more <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->

        @php
        use App\Models\Client;
        $serCount = Client::count('id');
        @endphp
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary text-center">
                <div class="inner">
                    <h3>{{$serCount}}</h3>

                    <h3>Client Number</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('clients.index')}}" class="small-box-footer"> read more <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->

        @php
        use App\Models\Dentist;
        $sparCount = Dentist::count('id');
        @endphp
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success text-center">
                <div class="inner">
                    <h3>{{$sparCount}}</h3>

                    <h3>Dentist number</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('dentists.index')}}" class="small-box-footer"> read more <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
{{--
        @php
        use App\Models\Employee;
        $count = Employee::count('id');
        @endphp

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red text-center">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <h3>عدد الموظفين</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('employees.index')}}" class="small-box-footer"> قراءة المزيد <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>


        @php
        use App\Models\Diploma;
        $count = Diploma::count('id');
        @endphp

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary text-center">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <h3>عدد الدبلومات</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('diplomas.index')}}" class="small-box-footer"> قراءة المزيد <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        @php
        use App\Models\Group;
        $count = Group::count('id');
        @endphp

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-green text-center">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <h3>عدد المجموعات</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('groups.index')}}" class="small-box-footer"> قراءة المزيد <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

    </div> --}}
</div>

@endsection

@section('scripts')

@endsection
