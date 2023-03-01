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
    return redirect()->route('admin.login');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('admin.subjects');
Route::get('/admin/topics', [TopicController::class, 'index'])->name('admin.topics');
Route::get('/admin/questions', [QuestionController::class, 'index'])->name('admin.questions');
