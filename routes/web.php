<?php

use App\Livewire\AttendanceReport;
use App\Livewire\Employees;
use App\Livewire\EmployeeUpload;
use App\Livewire\RecordManager;
use App\Livewire\UploadAttendance;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/records', RecordManager::class);
Route::get('/attendance', AttendanceReport::class)->name('attendance.report');
Route::get('/employees/upload', EmployeeUpload::class)->name('employees.upload');
Route::get('employees', Employees::class)->name('employees');

Route::get('/upload-attendance', UploadAttendance::class);
require __DIR__.'/settings.php';
