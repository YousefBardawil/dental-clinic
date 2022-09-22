@extends('cms.parent')
@section('tittle' , 'Home')

@section('main-tittle' , 'Home')
@section('sub-tittle' , 'Home')

@section('styles')

@if (App::getLocale() == 'ar')

@else

@endif

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

                    <h3>{{ trans('main-trans.Admin') }}</h3>
                </div>
                <div class="icon">

                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('admins.index')}}" class="small-box-footer">{{ trans('main-trans.read more') }}<i class="fa fa-arrow-circle-left"></i></a>
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

                    <h3>{{ trans('main-trans.Client') }}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('clients.index')}}" class="small-box-footer"> {{ trans('main-trans.read more') }} <i class="fa fa-arrow-circle-left"></i></a>
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

                    <h3>{{ trans('main-trans.Dentist') }}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('dentists.index')}}" class="small-box-footer"> {{ trans('main-trans.read more') }} <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->

        @php
        use App\Models\City;
        $count = City::count('id');
        @endphp

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red text-center">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <h3>{{ trans('main-trans.City') }}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('cities.index')}}" class="small-box-footer">{{ trans('main-trans.read more') }} <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>


        @php
        use App\Models\Room;
        $count = Room::count('id');
        @endphp

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary text-center">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <h3>{{ trans('main-trans.Room') }}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('rooms.index')}}" class="small-box-footer"> {{ trans('main-trans.read more') }}<i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

     @php
        use App\Models\Service;
        $count = Service::count('id');
        @endphp

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-green text-center">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <h3>{{ trans('main-trans.Service') }}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('services.index')}}" class="small-box-footer"> {{ trans('main-trans.read more') }}<i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')

@endsection
