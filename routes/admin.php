<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Route::get('/dashboard', function () {
//     return view('backend.index');
// })->name('admin.dashboard');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
});
// Route::get('/dashboard', function () {
//     dd(auth()->user()->hasRole('admin'));
// })->name('admin_dashboard');

// Route::middleware(['auth', 'role:super-admin'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
// });
