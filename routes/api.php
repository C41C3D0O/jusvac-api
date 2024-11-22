<?php

use App\Http\Controllers\Api\ConsultaMedicaApiController;
use App\Http\Controllers\Api\ProductoApiController;
use App\Http\Controllers\Api\UsuarioApiController;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// usuarios
Route::get('usuarios',[UsuarioApiController::class,'index']);
Route::post(uri: 'usuarios',action:[UsuarioApiController::class,'store']);
Route::get(uri: 'usuarios/{id}',action:[UsuarioApiController::class,'show']);
Route::put(uri: 'usuarios/{id}',action:[UsuarioApiController::class,'update']);
Route::delete(uri: 'usuarios/{id}',action:[UsuarioApiController::class,'destroy']);
//consulta medica
Route::get('consulta_medica',[ConsultaMedicaApiController::class,'index']);
Route::post(uri: 'consulta_medica',action:[ConsultaMedicaApiController::class,'store']);
Route::get(uri: 'consulta_medica/{id}',action:[ConsultaMedicaApiController::class,'show']);
Route::put(uri: 'consulta_medica/{id}',action:[ConsultaMedicaApiController::class,'update']);
Route::delete(uri: 'consulta_medica/{id}',action:[ConsultaMedicaApiController::class,'destroy']);