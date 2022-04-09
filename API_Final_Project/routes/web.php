<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\gradeController;
use App\Http\Controllers\fineController;
use App\Http\Controllers\libController;
use App\Http\Controllers\notificationController;



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

Route::get('/registration',[RegController::class,'reg'])->name('registration');
Route::get('/login',[RegController::class,'login'])->name('login');
Route::get('/logout',[RegController::class,'logout'])->name('logout');

Route::post('/registration',[RegController::class,'regsubmit'])->name('regsubmit');
Route::post('/login',[RegController::class,'logsubmit'])->name('logsubmit');



Route::get('/forgotpassword',[RegController::class,'forgot_password'])->name('forgot_password');
Route::post('/forgotpassword',[RegController::class,'forgot_pass'])->name('forgot_pass');




Route::get('/profile/profile',[RegController::class,'profile'])->middleware('auth.userid')->name('profile');
Route::get('/profile/edit',[RegController::class,'edit'])->middleware('auth.userid')->name('edit');

Route::post('/profile/edit',[RegController::class,'editsub'])->middleware('auth.userid')->name('editsub');


Route::get('/dashboard',[HomeController::class,'dashboard'])->middleware('auth.userid')->name('dashboard');


Route::get('/course/course',[HomeController::class,'course'])->middleware('auth.userid')->name('course');
Route::post('/course/showcourse',[HomeController::class,'showcourse'])->middleware('auth.userid')->name('showcourse');
Route::post('/course/coursesub',[HomeController::class,'coursesub'])->middleware('auth.userid')->name('coursesub');

Route::get('/gradereport/grade',[HomeController::class,'grade'])->middleware('auth.userid')->name('grade');




Route::get('/financ',[HomeController::class,'finance'])->middleware('auth.userid')->name('finance');

Route::get('/reg',[HomeController::class,'reg'])->middleware('auth.userid')->name('reg');

Route::post('/regsub',[HomeController::class,'regsub'])->middleware('auth.userid')->name('regsub');

Route::get('/gradereport/pdfdownload',[HomeController::class,'pdfdownload'])->middleware('auth.userid')->name('pdfdownload');



Route::get('/course/list',[gradeController::class,'list'])->middleware('auth.userid')->name('list');
Route::get('/course/details/{id}',[gradeController::class,'details'])->middleware('auth.userid')->name('details');





Route::get('/libs/lib',[libController::class,'library'])->middleware('auth.userid')->name('library');
Route::get('/libs/lib_fi',[libController::class,'lib_fi'])->middleware('auth.userid')->name('lib_fi');


Route::get('/notification/reg',[notificationController::class,'coursereg'])->middleware('auth.userid')->name('coursereg');


Route::get('/notification/course/{userid}',[notificationController::class,'schedule'])->middleware('auth.userid')->name('schedule');




Route::get('/notification/notify/{name}',[notificationController::class,'notify'])->middleware('auth.userid')->name('notify');

Route::get('/noti',[HomeController::class,'noti'])->middleware('auth.userid')->name('noti');








