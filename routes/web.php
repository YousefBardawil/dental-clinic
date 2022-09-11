<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\OpeningHourController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionClientController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\RolePermissionDController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email', function () {
    Mail::to('yousefalbardawil6@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

Route::get('cms/registeras',[AuthController::class, 'registerAs'])->name('view.RegisterAs');
Route::get('cms/admin/register',[AuthController::class, 'showRegisterAdmin'])->name('view.Register.admin');
Route::post('cms/do-register-admin',[AuthController::class, 'registerAdmin']);
Route::get('cms/dentist/register',[AuthController::class, 'showRegisterDentist'])->name('view.Register.dentist');
Route::post('cms/do-register-dentist',[AuthController::class, 'registerDentist']);
Route::get('cms/client/register',[AuthController::class, 'showRegisterClient'])->name('view.Register.client');
Route::post('cms/do-register-client',[AuthController::class, 'registerClient']);

Route::prefix('cms/')->middleware('guest:admin,dentist,client')->group(function(){
    Route::get('login',[AuthController::class,'loginAs'])->name('view.loginas');
    Route::get('{guard}/login',[AuthController::class, 'showlogin'])->name('view.login');
    Route::post('{guard}/login',[AuthController::class,'login']);

});

Route::prefix('cms/')->middleware('auth:admin,dentist,client')->group(function(){
    Route::get('admin' , [AuthController::class , 'logout'])->name('cms.logout');
    Route::get('edit/profile',[AuthController::class , 'editProfile'])->name('dashboard.profile');
    Route::get('edit/password',[SettingController::class ,'editpassword'])->name('cms.auth.editpassword');
    Route::post('update/password',[SettingController::class ,'updatepassword']);

});


Route::prefix('cms/')->middleware('auth:admin,dentist,client')->group(function(){
    Route::view('dashborad','cms.home')->name('dashborad');
    Route::resource('cities', CityController::class);
    Route::post('cities_update/{id}' , [CityController::class , 'update'] );
    Route::resource('rooms', RoomController::class);
    Route::post('rooms_update/{id}' , [RoomController::class , 'update'] );
    Route::resource('services', ServiceController::class);
    Route::post('services_update/{id}' , [ServiceController::class , 'update'] );
    Route::resource('clients', ClientController::class);
    Route::post('clients_update/{id}' , [ClientController::class , 'update'] );
    Route::resource('admins', AdminController::class);
    Route::post('admins_update/{id}' , [AdminController::class , 'update'] );
    Route::resource('dentists', DentistController::class);
    Route::post('dentists_update/{id}' , [DentistController::class , 'update'] );

    Route::resource('payments', PaymentController::class);
    Route::post('payments_update/{id}' , [PaymentController::class , 'update'] );
    Route::get('/create/payment/{id}', [PaymentController::class, 'createpayments'])->name('create.payment');
    Route::get('/index/payment/{id}', [PaymentController::class, 'indexpayments'])->name('index.payment');

    Route::resource('medical-histories', MedicalHistoryController::class);
    Route::post('medical-histories_update/{id}' , [MedicalHistoryController::class , 'update'] );
    Route::get('/create/med-history/{id}', [MedicalHistoryController::class, 'createmedicalhistories'])->name('create.med.history');
    Route::get('/index/med-history/{id}', [MedicalHistoryController::class, 'indexmedicalhistories'])->name('index.med.history');

    Route::resource('opening-hours', OpeningHourController::class);
    Route::post('opening-hours_update/{id}' , [OpeningHourController::class , 'update'] );
    Route::get('/create/opening-hours/{id}', [OpeningHourController::class, 'createopeninghours'])->name('create.opening.hours');
    Route::get('/index/opening-hours/{id}', [OpeningHourController::class, 'indexopeninghours'])->name('index.opening.hours');

    Route::resource('appointments', AppointmentController::class);
    Route::post('appointments_update/{id}' , [AppointmentController::class , 'update'] );
    Route::get('/create/appointments/{id}', [AppointmentController::class, 'createapponintment'])->name('create.appointments');
    Route::get('/index/appointments/{id}', [AppointmentController::class, 'indexappointment'])->name('index.appointments');

    Route::resource('contacts', ContactController::class);

    Route::resource('reviews', ReviewController::class);
    Route::post('reviews_update/{id}' , [ReviewController::class , 'update'] );
    Route::get('/create/reviews/{id}', [ReviewController::class, 'createreview'])->name('create.reviews');
    Route::get('/index/reviews/{id}', [ReviewController::class, 'indexreview'])->name('index.reviews');


    Route::resource('roles',RoleController::class);
    Route::post('roles_update/{id}' , [RoleController::class , 'update'] );
    Route::resource('permissions',PermissionController::class);
    Route::post('permissions_update/{id}' , [PermissionController::class , 'update'] );
    Route::resource('role.permissions',RolePermissionController::class);
   


});
