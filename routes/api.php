<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;

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

Route::get('/devices',[DeviceController::class, 'index']);

//Rutas privadas
Route::group(['middleware' => ['auth:sanctum']], function(){

    //Logout usuario
    Route::post('/logout',[AuthController::class, 'logout']);

});
