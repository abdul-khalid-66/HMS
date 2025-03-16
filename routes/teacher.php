<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Models\Teacher;

// Teacher Routes
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher_dashboard');
    Route::resource('/teacher', TeacherController::class)->only(['edit', 'show', 'update']);
});
