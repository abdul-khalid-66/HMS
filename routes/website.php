<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\TenantController;

Route::get('/', function () {
    return view('website.index');
})->name('home');


Route::get('/testing', function () {
    return view('welcome');
})->name('home');

Route::get('login', function () {
    return view('backend.login');
});
Auth::routes();
Route::get('/enrollment', [TenantController::class, 'create'])->name('enrollment.create');
Route::post('/enrollment', [TenantController::class, 'store'])->name('enroll.store');
