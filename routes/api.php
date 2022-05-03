<?php

use Illuminate\Auth\Events\Login;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});

// Login
Route::get('/user','App\Http\Controllers\AuthController@index'); //extraer todo los usuarios
Route::post('/user','App\Http\Controllers\AuthController@login'); //Login
Route::post('/user/create','App\Http\Controllers\AuthController@register'); //crear usuario


// Empleado
Route::get('/empleados','App\Http\Controllers\EmpleadoController@index'); //mostrar todos los registros
Route::get('/empleados/{id}','App\Http\Controllers\EmpleadoController@create'); //mostrar un registro
Route::post('/empleados','App\Http\Controllers\EmpleadoController@store'); //Crear nuevo registro
Route::put('/empleados','App\Http\Controllers\EmpleadoController@update'); //Actualizar nuevo registro
Route::delete('/empleados','App\Http\Controllers\EmpleadoController@destroy'); //Eliminar nuevo registro