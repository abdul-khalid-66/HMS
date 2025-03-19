<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TenantController;

// Super-Admin Routes
Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::get('/all-tenants', [TenantController::class, 'allTenants'])->name('all_tenants');
    Route::get('/tenants/{tenantId}/permissions/{roleId}', [SettingController::class, 'tenantPermissionSetting'])
        ->name('tenant.permissions');
    Route::post('/tenants/{tenantId}/permissions/{roleId}/update', [SettingController::class, 'updatePermissions'])
        ->name('tenant.update-permissions');
});

// Super-Admin and Admin Routes
Route::middleware(['auth', 'role:admin|super-admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/teachres', [TeacherController::class, 'index'])->name('teachers_view');
    Route::get('/teacher-create', [TeacherController::class, 'create'])->name('teacher_create');
    Route::post('/teacher-store', [TeacherController::class, 'store'])->name('teacher_store');
    Route::resource('teachers', TeacherController::class);
});
