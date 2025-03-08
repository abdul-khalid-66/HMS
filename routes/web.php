<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\TimetableController;

Route::get('/', function () {
    // return view('welcome');
    return view('website.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// Teacher Routes
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard']);
});

// Student Routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard']);
});

// Attendance Routes
Route::resource('attendances', AttendanceController::class);

// Fee Routes
Route::resource('fees', FeeController::class);

// Salary Routes
Route::resource('salaries', SalaryController::class);

// Exam Routes
Route::resource('exams', ExamController::class);

// Timetable Routes
Route::resource('timetables', TimetableController::class);
