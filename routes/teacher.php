<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

// Teacher Routes
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher_dashboard');
});
