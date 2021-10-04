<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/login',[\App\Http\Controllers\UserController::class,'login']);
Route::post('/consulta',[\App\Http\Controllers\RegistroController::class,'consulta']);
Route::post('/detallesdia',[\App\Http\Controllers\RegistroController::class,'detallesdia']);

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/logout',[\App\Http\Controllers\UserController::class,'logout']);
    Route::post('/me',[\App\Http\Controllers\UserController::class,'me']);
    Route::resource('/contribuyente',\App\Http\Controllers\ContribuyenteController::class);
    Route::resource('/registro',\App\Http\Controllers\RegistroController::class);
    Route::resource('/tipo',\App\Http\Controllers\TipoController::class);
    Route::post('/mes',[\App\Http\Controllers\RegistroController::class,'mes']);
    Route::post('/anio',[\App\Http\Controllers\RegistroController::class,'anio']);
    Route::get('/reporte/{tipo}',[\App\Http\Controllers\RegistroController::class,'reporte']);
    Route::get('/historialuser',[\App\Http\Controllers\UserController::class,'historialuser']);

});
