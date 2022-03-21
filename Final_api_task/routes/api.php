<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudapiController;
use App\Http\Controllers\departmentapicontroller;

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



Route::get('/course/view', [crudapiController::class,'view']);
Route::post('/course/add', [crudapiController::class,'add']);
Route::post('/course/update/{id}', [crudapiController::class,'update']);
Route::post('/course/delete/{id}', [crudapiController::class,'delete']);

Route::get('/department/view', [departmentapicontroller::class,'view']);
Route::post('/department/add', [departmentapicontroller::class,'add']);
Route::post('/department/update/{id}', [departmentapicontroller::class,'update']);
Route::post('/department/delete/{id}', [departmentapicontroller::class,'delete']);
Route::post('/department/{id}', [departmentapicontroller::class,'details']);
