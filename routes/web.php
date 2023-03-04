<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DynamicController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::controller(AuthController::class)->group(function () {
    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::controller(SubjectController::class)->group(function () {
        Route::get('/subjects', 'index')->name('subjects');
        Route::get('/subject/create', 'create')->name('subject.create')->middleware('auth');
        Route::post('/subject/create', 'store')->middleware('auth');
        Route::get('/subject/{subject}/edit', 'edit')->name('subject.edit')->middleware('auth');
        Route::post('/subject/{subject}/edit', 'update')->middleware('auth');
    });

    Route::controller(TopicController::class)->group(function () {
        Route::get('/topics', 'index')->name('topics');
        Route::get('/topic/create', 'create')->name('topic.create')->middleware('auth');
        Route::post('/topic/create', 'store')->middleware('auth');
        Route::get('/topic/{topic}/edit', 'edit')->name('topic.edit')->middleware('auth');
        Route::post('/topic/{topic}/edit', 'update')->middleware('auth');
    });

    Route::controller(QuestionController::class)->group(function () {
        Route::get('/questions', 'index')->name('questions');
        Route::get('/question/create', 'create')->name('question.create');
        Route::post('/question/create', 'store');
    });

    Route::controller(DynamicController::class)->group(function(){
        Route::post('subject/topics', 'fetch_topics')->name('subject.topics');
    });
});
