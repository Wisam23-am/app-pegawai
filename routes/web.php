<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'total_employees' => Employee::count(),
        'total_departments' => Department::count(),
        'total_positions' => Position::count(),
        'total_users' => User::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// ... sisa kode route lainnya tetap sama ...
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('employees', EmployeeController::class)->except(['index', 'show']);
    Route::resource('departments', DepartmentController::class)->except(['index', 'show']);
    Route::resource('positions', PositionController::class)->except(['index', 'show']);
    Route::resource('attendances', AttendanceController::class)->except(['index', 'show']);
    Route::resource('salaries', SalaryController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::resource('employees', EmployeeController::class)->only(['index', 'show']);
    Route::resource('departments', DepartmentController::class)->only(['index', 'show']);
    Route::resource('positions', PositionController::class)->only(['index', 'show']);
    Route::resource('attendances', AttendanceController::class)->only(['index', 'show']);

    Route::get('salaries/me', [SalaryController::class, 'me'])->name('salaries.me');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('salaries/{salary}', [SalaryController::class, 'show'])->name('salaries.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sync-data-pegawai', function () {
    $employees = Employee::with('user')->get();
    $count = 0;

    foreach ($employees as $employee) {
        if ($employee->user) {
            // Paksa data User mengikuti data Employee
            $employee->user->update([
                'name' => $employee->nama_lengkap,
                'email' => $employee->email,
            ]);
            $count++;
        }
    }

    return "Sukses! Berhasil menyinkronkan $count data pegawai ke akun user.";
});

require __DIR__ . '/auth.php';