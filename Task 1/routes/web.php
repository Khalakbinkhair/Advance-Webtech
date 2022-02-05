<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\studentController;

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

Route::get('/home',[pagesController::class,'Home'])->name('Home');
Route::get('/contact',[pagesController::class,'Contact'])->name('contact');
Route::get('/login',[pagesController::class,'Login'])->name('Login');
Route::get('/admin.adminlogin',[pagesController::class,'admlog'])->name('adminlogin');
Route::get('/student.studentlogin',[studentController::class,'stulog'])->name('studentlogin');
