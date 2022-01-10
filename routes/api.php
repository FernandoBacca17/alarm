<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ReportController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Crear usuario
Route::post('/register',[AuthController::class, 'register']);
//Login usuario
Route::post('/login',[AuthController::class, 'login']);
//Ver usuarios registrados
Route::get('/users',[UserController::class, 'index']);

//Ver devices registrados
Route::get('/devices',[DeviceController::class, 'index']);

//Ver vehicles registrados
Route::get('/vehicles',[VehicleController::class, 'index']);

//Ver reports
Route::get('/reports',[ReportController::class, 'index']);

//Rutas privadas
Route::group(['middleware' => ['auth:sanctum']], function(){

    //Logout usuario...
    Route::post('/logout',[AuthController::class, 'logout']);

    //New device
    Route::post('/device/register',[DeviceController::class, 'store']);

    //New vehicle
    Route::post('/vehicle/register',[VehicleController::class, 'store']);

    //New report
    Route::post('/report/register',[ReportController::class, 'store']);

});
