<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

require __DIR__ . '/auth.php';
