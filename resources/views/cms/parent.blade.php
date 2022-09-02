<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>cms @yield('tittle')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
  {{-- <link rel="stylesheet"   href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"  > --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">



  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('cms/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('cms/dist/img/logo2.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dental Clinic</span>
    </a>

     <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            @if (Auth::guard('admin')->id())
            @if (auth('admin')->user()->images !='')
            <img class="brand-image img-circle elevation-3" src="{{ asset('images/admin/' . auth('admin')->user()->images) }}"alt="User Image">
            @else
            <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}"alt="User Image">

            @endif

            @elseif (Auth::guard('client')->id())
            @if (auth('client')->user()->images !='')
            <img src="{{ asset('images/client/'.auth('client')->user()->images) }}" class="brand-image img-circle elevation-3" alt="User Image">
            @else
            <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}"alt="User Image">
            @endif

            @elseif (Auth::guard('dentist')->id())
            @if (auth('dentist')->user()->images !='')
            <img src="{{ asset('images/dentist/'.auth('dentist')->user()->images) }}" class="brand-image img-circle elevation-3" alt="User Image">
            @else
            <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}"alt="User Image">
            @endif

            @else
            <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}"alt="User Image">

            @endif
        </div>
        <div class="info">
            <div class="info">
                @if (Auth::guard('admin')->id())
                <a href="#" class="d-block"> {{ auth('admin')->user()->name }}</a>
                @elseif (Auth::guard('dentist')->id())
                <a href="#" class="d-block"> {{ auth('dentist')->user()->name }}</a>
                @else
                <a href="#" class="d-block"> {{ auth('client')->user()->name }}</a>

                @endif
            </div>
         </div>
      </div>


      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          @canAny(['Index-Role','Create-Role'])
          <li class="nav-header">Role and Permission</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-hand-sparkles"></i>
              <p>
                Role
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('Index-Role')
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Index</p>
                </a>
              </li>
              @endcan

              @can('Create-Role')
              <li class="nav-item">
                <a href="{{ route('roles.create') }}" class="nav-link">
                  <i class="fas fa-plus nav-icon text-light"></i>
                  <p>Create</p>
                </a>
              </li>
              @endcan


            </ul>
          </li>
          @endcanAny

          @canAny(['Index-permission','Create-permission'])
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-person-circle-exclamation"></i>
               <p>
                Permission
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-permission')
                <li class="nav-item">
                    <a href="{{ route('permissions.index') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>

                      <p>Index</p>
                    </a>
                  </li>
                @endcan
                @can('Create-permission')
                <li class="nav-item">
                    <a href="{{ route('permissions.create') }}" class="nav-link">
                      <i class="fas fa-plus nav-icon text-light"></i>
                      <p>Create</p>
                    </a>
                  </li>
                @endcan

            </ul>
          </li>
            @endcanAny

          <li class="nav-header">Users</li>

          @canAny(['Index-Admin' , 'Create-Admin'])
          <li class="nav-item">
            <a href="#" class="nav-link">

                <i class="fa-solid fa-user-tie"></i>
                 <p class="mx-2">
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('Index-Admin')
            <li class="nav-item">
                <a href="{{ route('admins.index') }}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>

                  <p>Index</p>
                </a>
              </li>

            @endcan

             @can('Create-Admin')
              <li class="nav-item">
             <a href="{{ route('admins.create') }}" class="nav-link">
             <i class="fas fa-plus nav-icon text-light"></i>
             <p>Create</p>
             </a>
            </li>

             @endcan


            </ul>
          </li>

          @endcanAny

         @canAny(['Index-Client','Create-Client'])
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-user"></i>
                 <p class="mx-2">
                Client
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-Client')
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>

                      <p>Index</p>
                    </a>
                  </li>
                @endcan

                @can('Create-Client')
                <li class="nav-item">
                    <a href="{{ route('clients.create') }}" class="nav-link">
                      <i class="fas fa-plus nav-icon text-light"></i>
                      <p>Create</p>
                    </a>
                  </li>
                @endcan


            </ul>
          </li>

          @endcanAny

          @canAny(['Index-Dentist' , 'Create-Dentist'])
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-user-doctor"></i>
              <p class="mx-2">
                Dentist
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-Dentist')
                <li class="nav-item">
                    <a href="{{ route('dentists.index') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>

                      <p>Index</p>
                    </a>
                  </li>

                @endcan

                @can('Create-Dentist')
                <li class="nav-item">
                    <a href="{{ route('dentists.create') }}" class="nav-link">
                      <i class="fas fa-plus nav-icon text-light"></i>
                      <p>Create</p>
                    </a>
                  </li>
                @endcan

            </ul>
          </li>

          @endcanAny

          <li class="nav-header">content resources</li>

          @canAny(['Index-City','Create-City'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-tree-city"></i>
              <p class="mx-2">
                City
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-City')
                <li class="nav-item">
                    <a href="{{ route('cities.index') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>

                      <p>Index</p>
                    </a>
                  </li>
                @endcan

                @can('Create-City')
                <li class="nav-item">
                    <a href="{{ route('cities.create') }}" class="nav-link">
                      <i class="fas fa-plus nav-icon text-light"></i>
                      <p>Create</p>
                    </a>
                  </li>
                @endcan
            </ul>
          </li>
           @endcanAny

           @canAny(['Index-Room','Create-Room'])
           <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-person-shelter"></i>
              <p class="mx-2">
                Room
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-Room')
                <li class="nav-item">
                    <a href="{{ route('rooms.index') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>

                      <p>Index</p>
                    </a>
                  </li>
                @endcan

                @can('Create-Room')
                <li class="nav-item">
                    <a href="{{ route('rooms.create') }}" class="nav-link">
                      <i class="fas fa-plus nav-icon text-light"></i>
                      <p>Create</p>
                    </a>
                  </li>
                @endcan
            </ul>
          </li>

           @endcanAny

         @canAny(['Index-Service','Create-Service'])
         <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-brands fa-servicestack"></i>
              <p class="mx-2">
                Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-Service')
                <li class="nav-item">
                    <a href="{{ route('services.index') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>

                      <p>Index</p>
                    </a>
                  </li>
                @endcan
                @can('Create-Service')
                <li class="nav-item">
                    <a href="{{ route('services.create') }}" class="nav-link">
                      <i class="fas fa-plus nav-icon text-light"></i>
                      <p>Create</p>
                    </a>
                  </li>
                @endcan
            </ul>
          </li>

         @endcanAny
         @canAny(['Index-Appointment'])
         <li class="nav-item">
           <a href="#" class="nav-link">
            <i class="fa-solid fa-calendar-check"></i>
             <p class="mx-2">
               Appointment
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
               @can('Index-Appointment')
               <li class="nav-item">
                   <a href="{{ route('appointments.index') }}" class="nav-link">
                     <i class="fas fa-list nav-icon"></i>

                     <p>Index</p>
                   </a>
                 </li>
               @endcan
           </ul>
         </li>
         @endcanAny
         @canAny(['Index-Payment'])
         <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="fa-solid fa-calendar-check"></i>
              <p class="mx-2">
               Payment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-Payment')
                <li class="nav-item">
                    <a href="{{ route('payments.index') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Index</p>
                    </a>
                  </li>
                @endcan


            </ul>
          </li>
          @endcanAny
         @canAny(['Index-Review'])
         <li class="nav-item">
           <a href="#" class="nav-link">
            <i class="fa-solid fa-calendar-check"></i>
             <p class="mx-2">
              Review
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
               @can('Index-Review')
               <li class="nav-item">
                   <a href="{{ route('reviews.index') }}" class="nav-link">
                     <i class="fas fa-list nav-icon"></i>

                     <p>Index</p>
                   </a>
                 </li>
               @endcan
           </ul>
         </li>
         @endcanAny



              @canAny(['Index-OpeningHour'])
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-business-time"></i>
                  <p class="mx-2">
                    Opening-Hours
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('Index-OpeningHour')
                    <li class="nav-item">
                        <a href="{{ route('opening-hours.index') }}" class="nav-link">
                          <i class="fas fa-list nav-icon"></i>

                          <p>Index</p>
                        </a>
                      </li>
                    @endcan
                </ul>
              </li>
          @endcanAny

          @canAny(['Index-MedicalHistory'])
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-business-time"></i>
              <p class="mx-2">
                Medical History
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-MedicalHistory')
                <li class="nav-item">
                    <a href="{{ route('medical-histories.index') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>

                      <p>Index</p>
                    </a>
                  </li>
                @endcan
            </ul>
          </li>
      @endcanAny


          @canAny(['Index-ContactUs','Create-ContactUs'])
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-phone"></i>
              <p class="mx-2">
                Contact Us
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Index-ContactUs')
              <li class="nav-item">
                <a href="{{ route('contacts.index') }}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Index</p>
                </a>
              </li>

              @endcan
              @can('Create-ContactUs')
              <li class="nav-item">
                <a href="{{ route('contacts.create') }}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

              @endcan


            </ul>
          </li>


          @endcanAny

          <li class="nav-header">settings</li>

          <li class="nav-item">
            <a href="{{ route('dashboard.profile') }}" class="nav-link">
              <i class="nav-icon fas fa-edit text-info"></i>
              <p class="text">Edit your profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cms.auth.editpassword') }}" class="nav-link">
              <i class="nav-icon fas fa-key text-success"></i>
              <p class="text">Change password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cms.logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class="text">Log out</p>
            </a>
          </li>

        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('main-tittle')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('sub-tittle')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @yield('content')

  </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{ now()->year }} - {{ now()->year+1 }} <a href="">{{ env('APP_NAME') }}</a></strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> {{ env('APP_VERSION') }}
    </div>
    <div class="float-right d-none d-sm-inline-block mx-5">
        <b>By</b> {{ env('APP_USERNAME') }}
      </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('cms/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('cms/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('cms/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('cms/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('cms/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('cms/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="{{ asset('cms/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('cms/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('cms/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('cms/js/crud.js') }}"></script>



@yield('scripts')
</body>
</html>
