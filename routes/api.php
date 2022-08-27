<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\AuthUserController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\ContactUsController;
use App\Http\Controllers\API\DentistController;
use App\Http\Controllers\API\MedicalHistoryController;
use App\Http\Controllers\API\OpeningHourController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\RolePermissionController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('cities', CityController::class);
Route::apiResource('rooms', RoomController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('dentists', DentistController::class);
Route::apiResource('admins', AdminController::class);
Route::apiResource('openinghours', OpeningHourController::class);
Route::apiResource('appointments', AppointmentController::class);
Route::apiResource('contacts', ContactUsController::class);
Route::apiResource('reviews', ReviewController::class);
Route::apiResource('medicalhistories', MedicalHistoryController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('permissions', PermissionController::class);

Route::prefix('auth')->group(function(){
    Route::post('register',[AuthUserController::class,'register']);
    // Route::post('login',[AuthUserController::class,'login']);
});




