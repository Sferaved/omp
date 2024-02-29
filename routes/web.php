<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');;

Route::get('/gdpr', function () {
    return view('gdpr');
})->name('gdpr');

Route::get('/umovy', function () {
    return view('umovy');
})->name('umovy');

Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/feedback/email', [HomeController::class, 'feedbackEmail'])->name('email');



Auth::routes(['verify' => true]);


Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('verified');
Route::get('/homeAdmin', [AdminController::class, 'homeAdmin'])->name('homeAdmin')
   /* ->middleware('role:superadministrator')*/;

Route::get('/homeUsers', [AdminController::class, 'homeUsers'])->name('homeUsers')
    /*->middleware('role:superadministrator')*/;

Route::get('/users/edit/{id}/{name}/{email}', [UserController::class,'edit'])
    ->middleware('role:superadministrator');
Route::get('/users/destroy/{id}', [UserController::class,'destroy'])
    ->middleware('role:superadministrator');
Route::get('/laratrustPanel', [AdminController::class, 'laratrust'])->name('laratrust')
    ->middleware('role:superadministrator');

Route::get('/allUsers', [UserController::class,'allUsers']);
