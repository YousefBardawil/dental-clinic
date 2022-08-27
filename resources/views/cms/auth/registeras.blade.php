<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('login/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
<link rel="stylesheet"   href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"  >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">


</head>

<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Register As
					</span>

                    <div class="login100-form-social flex-c-m " >

                        <div class="p-3 bg-secondary d-flex  justify-content-center " style="width: 120px; height: 105px;">
                            <a href="{{ route('view.Register.admin') }}" class="text-black d-block text-decoration-none" >
                                <i class="fa-solid fa-user display-4"></i>
                                <div class="text-black font-weight-bold mt-1"> Admin</div>
                            </a>
                        </div>

                        <div class="p-3 bg-primary d-flex  justify-content-center mx-4 " style="width: 120px; height: 105px;">
                            <a href="{{ route('view.Register.dentist') }}" class="text-black d-block text-decoration-none" >
                                <i class="fa-solid fa-user-doctor display-4 "></i>
                               <div class="text-black font-weight-bold mt-1"> Dentist</div>
                            </a>
                        </div>

					</div>

                    <div class="container-login100-form-btn my-4">
                        <a href="{{ route('view.loginas') }}" class="btn btn-primary" >
                            Sign In
                        </a>
                    </div>


				</form>
                <div class="login100-more" style="
                background-image: url({{ asset('login/images/attachment_112096128.png') }});
                ">
                </div>

			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/js/main.js') }}"></script>
    <!-- jQuery -->
<script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('cms/js/crud.js') }}"></script>



</body>
</html>
