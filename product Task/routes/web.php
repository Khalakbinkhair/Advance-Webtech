<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\CRUDController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.  Now create something great!
|
*/

Route::get('/registration',[productController::class,'reg'])->name('registration');
Route::get('/home',[productController::class,'Home'])->name('Home');


Route::get('/update',[CRUDController::class,'Update'])->name('update');
Route::get('/delete',[CRUDController::class,'Delete'])->name('delete');
Route::get('/get/{userid?}',[CRUDController::class,'Get'])->name('get');
Route::get('/list',[CRUDController::class,'list'])->name('list');




Route::post('/registration',[productController::class,'regsubmit'])->name('reg.submit');


