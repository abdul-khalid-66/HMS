<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;

// Admin Routes
Route::middleware(['auth', 'role:admin|super-admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/teachres', [TeacherController::class, 'index'])->name('teachers_view');
    Route::get('/teacher-create', [TeacherController::class, 'create'])->name('teacher_create');
    Route::post('/teacher-store', [TeacherController::class, 'store'])->name('teacher_store');


    Route::resource('teachers', TeacherController::class);
});
