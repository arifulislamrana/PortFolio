<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\FrontController;
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

Route::get('/', [FrontController::class, 'index'])->name('home');

Route::get('/blog/details/{id}', [FrontController::class, 'blog'])->name('blog');

Route::post('subcriber/contact',[FrontController::class, 'contact'])->name('contact');

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('login');

Route::post('/admin/login/post', [AdminAuthController::class, 'loginPost'])->name('login.post');

Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('homes', HomeController::class);

    Route::resource('abouts', AboutController::class);

    Route::resource('resumes', ResumeController::class);

    Route::resource('services', ServiceController::class);

    Route::resource('skills', SkillController::class);

    Route::resource('projects', ProjectController::class);

    Route::resource('blogs', BlogController::class);

});

