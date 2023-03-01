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
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::controller(SubjectController::class)->group(function () {
    Route::get('admin/subjects', 'index')->name('admin.subjects');
    Route::get('admin/subject/create', 'create')->name('admin.subject.create');
    Route::post('admin/subject/create', 'store');
    Route::get('admin/subject/{subject}/edit', 'edit')->name('admin.subject.edit');
    Route::post('admin/subject/{subject}/edit', 'update');
});

Route::controller(TopicController::class)->group(function(){
    Route::get('/admin/topics', 'index')->name('admin.topics');
    Route::get('/admin/topic/create', 'create')->name('admin.topic.create');
    Route::post('/admin/topic/create', 'store');
});

Route::get('/admin/questions', [QuestionController::class, 'index'])->name('admin.questions');
