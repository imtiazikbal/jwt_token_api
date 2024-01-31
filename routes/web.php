<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserTokenVarification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Font End
Route::view('/register','pages.auth.registration-page');
Route::view('/login','pages.auth.login-page');
Route::view('/Profile','pages.dashboard.profile-page')->middleware(UserTokenVarification::class);


//Backen Part

Route::post('/userRegistration',[UserController::class,'userRegistration']);
Route::post('/userLogin',[UserController::class,'userLogin']);
Route::get('/userProfile',[UserController::class,'userProfile'])->middleware(UserTokenVarification::class);
Route::get('/userLogout',[UserController::class,'userLogout'])->middleware(UserTokenVarification::class);