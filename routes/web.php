<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\TimetableController;

Route::get('/', function () {
    return view('website.index');
})->name('home');

Auth::routes();

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
