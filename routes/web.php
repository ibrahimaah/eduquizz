<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\AuthController as SiteAuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\PlacementTestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as SiteHomeController;

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
Route::controller(AuthController::class)->group(function () {
    Route::get('admin/login', 'getLoginForm')->name('admin.getLoginForm');
    Route::post('admin/login', 'login')->name('admin.login');
    Route::get('admin/logout', 'logout')->name('admin.logout');
});



Route::middleware(['auth'])->prefix('admin')->group(function () 
{
    Route::get('/', [HomeController::class, 'index'])->name('admin_dashboard');
    Route::get('statistics', [StatisticController::class, 'index'])->name('admin.statistics');

    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('admin.users');
        Route::get('users/create', 'create')->name('admin.users.create');
        Route::post('users/store', 'store')->name('admin.users.store');
        Route::get('users/{user}/edit', 'edit')->name('admin.users.edit');
        Route::post('users/{user}/update', 'update')->name('admin.users.update');
        Route::post('users/{user}/delete', 'delete')->name('admin.users.delete');
    });

    //Subjects
    Route::controller(SubjectController::class)->group(function () {
        Route::get('subjects', 'index')->name('admin.subjects');
        Route::get('subjects/create', 'create')->name('admin.subjects.create');
        Route::post('subjects/store', 'store')->name('admin.subjects.store');
        Route::get('subjects/{subject}/edit', 'edit')->name('admin.subjects.edit');
        Route::post('subjects/{subject}/update', 'update')->name('admin.subjects.update');
        Route::post('subjects/{subject}/delete', 'delete')->name('admin.subjects.delete');
    });
    
    //Levels
    Route::controller(LevelController::class)->group(function () {
        Route::get('subjects/{subject}/levels', 'index')->name('admin.levels');
        Route::get('subjects/{subject}/levels/create', 'create')->name('admin.levels.create');
        Route::post('levels', 'store')->name('admin.levels.store');
        Route::get('levels/{level}/edit', 'edit')->name('admin.levels.edit');
        Route::post('levels/{level}/update', 'update')->name('admin.levels.update');
        Route::post('levels/{level}/delete', 'delete')->name('admin.levels.delete');
    });
     
    // Lessons 
    Route::controller(LessonController::class)->group(function () {
        Route::get('levels/{level}/lessons', 'index')->name('admin.lessons');
        Route::get('levels/{level}/lessons/create', 'create')->name('admin.lessons.create');
        Route::post('lessons/{level}', 'store')->name('admin.lessons.store');
        Route::get('lessons/{lesson}/edit', 'edit')->name('admin.lessons.edit');
        Route::post('lessons/{lesson}/update', 'update')->name('admin.lessons.update');
        Route::post('lessons/{lesson}/delete', 'delete')->name('admin.lessons.delete');
    });
    

    //Questions
    Route::controller(QuestionController::class)->group(function () {
        Route::get('lessons/{lesson}/questions', 'index')->name('admin.questions');
        Route::get('lessons/{lesson}/questions/create', 'create')->name('admin.questions.create');
        Route::post('lessons/{lesson}/questions', 'store')->name('admin.questions.store');
        Route::get('questions/{question}/edit', 'edit')->name('admin.questions.edit');
        Route::post('questions/{question}/update', 'update')->name('admin.questions.update');
        Route::post('questions/{question}/delete', 'delete')->name('admin.questions.delete');
    });
    
});

Route::middleware(['auth'])->group(function () 
{
    
});
Route::get('init-placement-test-questions',[PlacementTestController::class,'init'])->name('init_placement_test');
Route::get('placement-test-questions',[PlacementTestController::class,'index'])->name('placement_test');
Route::post('submit-placement-test',[PlacementTestController::class,'submitTest'])->name('placement_test.submit');
Route::get('login',[SiteAuthController::class,'showLoginForm'])->name('showLoginForm');
Route::post('login',[SiteAuthController::class,'login'])->name('login');
Route::get('register',[SiteAuthController::class,'showRegisterForm'])->name('showRegisterForm');
Route::post('register',[SiteAuthController::class,'register'])->name('register');

Route::get('/',[SiteHomeController::class,'index'])->name('home');


