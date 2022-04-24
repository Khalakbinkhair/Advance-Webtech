<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIGradeController;
use App\Http\Controllers\APINoticeController;
use App\Http\Controllers\APIRegistrationController;
use App\Http\Controllers\APIFacController;
use App\Http\Controllers\APIfinanceController;



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

// #Grade Controller
Route::get('/course/list',[APIGradeController::class,'view']);
Route::post('/course/add', [APIGradeController::class,'add']);
Route::post('/course/update/{id}',[APIGradeController::class,'update']);
Route::post('/course/delete/{id}',[APIGradeController::class,'delete']);

// #Notice Controller
Route::get('/teacher_notice/list',[APINoticeController::class,'view']);
Route::post('/teacher_notice/add', [APINoticeController::class,'add']);
Route::post('/teacher_notice/update/{id}',[APINoticeController::class,'update']);
Route::post('/teacher_notice/delete/{id}',[APINoticeController::class,'delete']);

// #Registration Controller

Route::get('/registration/list',[APIRegistrationController::class,'view']);
Route::post('/registration/add', [APIRegistrationController::class,'add']);
Route::post('/registration/update/{id}',[APIRegistrationController::class,'update']);
Route::post('/registration/delete/{id}',[APIRegistrationController::class,'delete']);

// #Facs Controller

Route::get('/fac/list',[APIFacController::class,'view']);
Route::post('/fac/add', [APIFacController::class,'add']);
Route::post('/fac/update/{id}',[APIFacController::class,'update']);
Route::post('/fac/delete/{id}',[APIFacController::class,'delete']);

// #finances Controller

Route::get('/finance/list',[APIfinanceController::class,'view']);
Route::post('/finance/add', [APIfinanceController::class,'add']);
Route::post('/finance/update/{id}',[APIfinanceController::class,'update']);
Route::post('/finance/delete/{id}',[APIfinanceController::class,'delete']);



Route::post('/login', [APIRegistrationController::class,'login']);