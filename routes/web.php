<?php

use App\Enums\UserRole;
use App\Livewire\AdminDashboard;
use App\Livewire\AttendanceReport;
use App\Livewire\Employees;
use App\Livewire\EmployeeUpload;
use App\Livewire\RecordManager;
use App\Livewire\UploadAttendance;
use App\Livewire\UserDashboard;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return match (auth()->user()->role) {
            UserRole::ADMIN => redirect()->route('admin.dashboard'),
            UserRole::MANAGER => redirect()->route('admin.dashboard'),
            UserRole::USER => redirect()->route('user.dashboard'),
        };
    })->name('dashboard');

    Route::get('/admin-dashboard', AdminDashboard::class)
        ->middleware('role:admin,manager')
        ->name('admin.dashboard');

    Route::get('/user-dashboard', UserDashboard::class)
        ->middleware('role:user')
        ->name('user.dashboard');
});
Route::get('/records', RecordManager::class);
Route::get('/attendance', AttendanceReport::class)->name('attendance.report');
Route::get('/employees/upload', EmployeeUpload::class)->name('employees.upload');
Route::get('employees', Employees::class)->name('employees');

Route::get('/upload-attendance', UploadAttendance::class);

Route::get('/users', Users::class)->name('users.index');

require __DIR__.'/settings.php';
