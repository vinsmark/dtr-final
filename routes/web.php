<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RecordManager;
use App\Livewire\AttendanceReport;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/records', RecordManager::class);
Route::get('/attendance', AttendanceReport::class)->name('attendance.report');
require __DIR__.'/settings.php';
