<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DentistController;
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


Route::prefix('cms')->group(function(){

    Route::view('/',' cms.parent');
    Route::resource('cities', CityController::class);
    Route::post('cities_update/{id}' , [CityController::class , 'update'] );
    Route::resource('clients', ClientController::class);
    Route::post('clients_update/{id}' , [ClientController::class , 'update'] );
    Route::resource('dentists', DentistController::class);
    Route::post('dentists_update/{id}' , [DentistController::class , 'update'] );

});
