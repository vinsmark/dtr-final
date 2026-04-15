<?php

use App\Enums\UserRole;
use App\Livewire\AdminDashboard;
use App\Livewire\AttendanceReport;
use App\Livewire\Attendances;
use App\Livewire\DtrReport;
use App\Livewire\EmployeeProfile;
use App\Livewire\Employees;
use App\Livewire\EmployeeUpload;
use App\Livewire\HolidayManager;
use App\Livewire\LeaveManager;
use App\Livewire\OvertimeManager;
use App\Livewire\PayrollManager;
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
Route::get('/attendances', Attendances::class)->name('attendances.index');
Route::get('/upload-attendance', UploadAttendance::class);

Route::get('/users', Users::class)->name('users.index');
Route::get('/dtr', DtrReport::class)->name('dtr');
Route::get('/holidays', HolidayManager::class)->name('holidays');
Route::get('/leaves', LeaveManager::class)->name('leaves');
Route::get('/overtime', OvertimeManager::class)->name('overtime');
Route::get('/payroll', PayrollManager::class)->name('payroll');
Route::get('/employee/{id}/profile', EmployeeProfile::class)->name('employee.profile');
require __DIR__.'/settings.php';
