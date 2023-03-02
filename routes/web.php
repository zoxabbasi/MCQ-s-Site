<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\auth\AuthController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->controller(SubjectController::class)->group(function () {
    Route::get('/subjects', 'index')->name('subjects');
    Route::get('/subject/create', 'create')->name('subject.create')->middleware('auth');
    Route::post('/subject/create', 'store')->middleware('auth');
    Route::get('/subject/{subject}/edit', 'edit')->name('subject.edit')->middleware('auth');
    Route::post('/subject/{subject}/edit', 'update')->middleware('auth');
});

Route::prefix('admin')->name('admin.')->controller(TopicController::class)->group(function () {
    Route::get('/topics', 'index')->name('topics');
    Route::get('/topic/create', 'create')->name('topic.create')->middleware('auth');
    Route::post('/topic/create', 'store')->middleware('auth');
    Route::get('/topic/{topic}/edit', 'edit')->name('topic.edit')->middleware('auth');
    Route::post('/topic/{topic}/edit', 'update')->middleware('auth');
});

Route::get('/admin/questions', [QuestionController::class, 'index'])->name('admin.questions');
