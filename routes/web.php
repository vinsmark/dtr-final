<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RecordManager;
use App\Livewire\AttendanceReport;
use App\Livewire\EmployeeUpload;
Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/records', RecordManager::class);
Route::get('/attendance', AttendanceReport::class)->name('attendance.report');
Route::get('/employees/upload', EmployeeUpload::class)->name('employees.upload');
require __DIR__.'/settings.php';
