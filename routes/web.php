<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserImportController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\LogPageVisit;



Route::middleware([LogPageVisit::class])->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::middleware('auth')->group(function () {
        Route::get('/main', [PageController::class, 'main'])->name('main');
        Route::get('/projects', [PageController::class, 'projects'])->name('projects');
        Route::get('/libary', [PageController::class, 'libary'])->name('libary');
        Route::get('/admin', [PageController::class, 'admin'])->name('admin');
        Route::get('/logs', [LogController::class, 'getLogs']);
    });
});


Route::get('/test', [UserImportController::class, 'import']);


require __DIR__ . '/auth.php';
