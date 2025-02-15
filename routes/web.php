<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
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

//Authentication routes
Route::get('admin/login', [AuthController::class,'getLoginForm'])->name('admin.getLoginForm');
Route::post('admin/login', [AuthController::class,'login'])->name('admin.login');
Route::get('admin/logout', [AuthController::class,'logout'])->name('admin.logout');


Route::middleware(['auth'])->group(function () {
    Route::get('admin', [HomeController::class,'index'])->name('admin_dashboard');
    Route::get('statistics', [StatisticController::class,'index'])->name('admin.statistics');
    Route::get('users', [UserController::class,'index'])->name('admin.users');
    Route::get('users/create', [UserController::class,'create'])->name('admin.users.create');
    Route::post('users/store', [UserController::class,'store'])->name('admin.users.store');
    Route::get('users/edit/{id}', [UserController::class,'edit'])->name('admin.users.edit');
    Route::post('users/update/{id}', [UserController::class,'update'])->name('admin.users.update');
    Route::post('users/delete/{id}', [UserController::class,'delete'])->name('admin.users.delete');

    //subjects
    Route::get('subjects', [SubjectController::class,'index'])->name('admin.subjects');
    Route::get('subjects/create', [SubjectController::class,'create'])->name('admin.subjects.create');
    Route::post('subjects/store', [SubjectController::class,'store'])->name('admin.subjects.store');
    Route::get('subjects/edit/{id}', [SubjectController::class,'edit'])->name('admin.subjects.edit');
    Route::post('subjects/update/{id}', [SubjectController::class,'update'])->name('admin.subjects.update');
    Route::post('subjects/delete/{id}', [SubjectController::class,'delete'])->name('admin.subjects.delete');


    Route::get('/', function () {
        return view('admin.index');
    });
});


