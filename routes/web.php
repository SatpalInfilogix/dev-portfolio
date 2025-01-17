<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'redirectToDashboard']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resources([
        'projects' => ProjectController::class,
    ]);
});

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

/* Datatable Apis */
Route::post('/get-projects', [ProjectController::class, 'getProjects'])->name('projects.get');