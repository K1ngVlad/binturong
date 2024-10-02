<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', [PageController::class, 'home'])->name('home');

// Route::get('/import', [ProjectController::class, 'import'])->name('import');

Route::middleware('auth')->group(function () {
    Route::get('/main', [PageController::class, 'main'])->name('main');
    Route::get('/projects', [PageController::class, 'projects'])->name('projects');
    Route::get('/libary', [PageController::class, 'libary'])->name('libary');
    Route::get('/admin', [PageController::class, 'admin'])->name('admin');
    Route::get('/admin/import', [PageController::class, 'import'])->name('import');
    Route::post('/import', [ProjectController::class, 'import']);
});

require __DIR__ . '/auth.php';
