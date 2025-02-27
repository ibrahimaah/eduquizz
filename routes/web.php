<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\ChapterController;
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


Route::middleware(['auth'])->group(function () 
{
    Route::get('admin', [HomeController::class,'index'])->name('admin_dashboard');
    Route::get('statistics', [StatisticController::class,'index'])->name('admin.statistics');
    Route::get('users', [UserController::class,'index'])->name('admin.users');
    Route::get('users/create', [UserController::class,'create'])->name('admin.users.create');
    Route::post('users/store', [UserController::class,'store'])->name('admin.users.store');
    Route::get('users/{id}/edit', [UserController::class,'edit'])->name('admin.users.edit');
    Route::post('users/{id}/update', [UserController::class,'update'])->name('admin.users.update');
    Route::post('users/{id}/delete', [UserController::class,'delete'])->name('admin.users.delete');

    //subjects
    Route::get('subjects', [SubjectController::class,'index'])->name('admin.subjects');
    Route::get('subjects/create', [SubjectController::class,'create'])->name('admin.subjects.create');
    Route::post('subjects/store', [SubjectController::class,'store'])->name('admin.subjects.store');
    Route::get('subjects/{id}/edit', [SubjectController::class,'edit'])->name('admin.subjects.edit');
    Route::post('subjects/{id}/update', [SubjectController::class,'update'])->name('admin.subjects.update');
    Route::post('subjects/{id}/delete', [SubjectController::class,'delete'])->name('admin.subjects.delete');

    //levels
    Route::get('subjects/{subject_id}/levels', [LevelController::class, 'index'])->name('admin.levels');
    Route::get('subjects/{subject_id}/levels/create', [LevelController::class, 'create'])->name('admin.levels.create');
    Route::post('levels', [LevelController::class, 'store'])->name('admin.levels.store');
    Route::get('levels/{level}/edit', [LevelController::class, 'edit'])->name('admin.levels.edit');
    Route::post('levels/update/{level}', [LevelController::class, 'update'])->name('admin.levels.update');
    Route::post('levels/delete/{level}', [LevelController::class, 'delete'])->name('admin.levels.delete');

     
    // Lessons 
    Route::get('lessons/{level}', [LessonController::class, 'index'])->name('admin.lessons');
    Route::get('lessons/create/{level}', [LessonController::class, 'create'])->name('admin.lessons.create');
    Route::post('lessons/{level}', [LessonController::class, 'store'])->name('admin.lessons.store');
    Route::get('lessons/{level}/{lesson}/edit', [LessonController::class, 'edit'])->name('admin.lessons.edit');
    Route::post('lessons/update/{lesson}', [LessonController::class, 'update'])->name('admin.lessons.update');
    Route::post('lessons/delete/{lesson}', [LessonController::class, 'delete'])->name('admin.lessons.delete');


});

Route::get('/', function () {
    return view('home');
})->name('home');


