<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    // Root → Companies
    Route::get('/', fn() => redirect()->route('companies.index'));

    // Keep a named 'dashboard' (Breeze nav uses it)
    Route::get('/dashboard', fn() => redirect()->route('companies.index'))
        ->name('dashboard');

    // Keep profile routes (Breeze dropdown uses them)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Our CRUD
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
});

require __DIR__.'/auth.php';
