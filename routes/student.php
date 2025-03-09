<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Student Routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student_dashboard');
});
