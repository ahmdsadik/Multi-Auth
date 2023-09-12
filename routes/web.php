<?php

//use App\Http\Controllers\admin\auth\authenticationController as adminAuthenticationController;
//use App\Http\Controllers\employee\auth\authenticationController as employeeAuthenticationController;
//use App\Http\Controllers\user\auth\authenticationController as userAuthenticationController;


use App\Http\Controllers\{
    admin\auth\authenticationController as adminAuthenticationController,
    employee\auth\authenticationController as employeeAuthenticationController,
    user\auth\authenticationController as userAuthenticationController
};
use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [adminAuthenticationController::class, 'create'])->name('login')->middleware('guest');
    Route::post('login', [adminAuthenticationController::class, 'store'])->name('store');
    Route::post('logout', [adminAuthenticationController::class, 'destroy'])->name('logout')->middleware('auth:admin');
});
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('login', [employeeAuthenticationController::class, 'create'])->name('login')->middleware('guest');
    Route::post('login', [employeeAuthenticationController::class, 'store'])->name('store');
    Route::post('logout', [employeeAuthenticationController::class, 'destroy'])->name('logout')->middleware('auth:employee');
});

Route::name('user.')->group(function () {
    Route::get('login', [userAuthenticationController::class, 'create'])->name('login')->middleware('guest');
    Route::post('login', [userAuthenticationController::class, 'store'])->name('store');
    Route::post('logout', [userAuthenticationController::class, 'destroy'])->name('logout')->middleware('auth');
});


Route::view('dashboard', 'admin.dashboard')->middleware('auth:admin,employee')->name('dashboard');
Route::view('/', 'dashboard')->middleware('auth')->name('welcome');
