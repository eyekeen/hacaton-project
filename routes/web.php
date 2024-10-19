<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\DeanCheck;
use App\Http\Middleware\DepartmentCheck;
use App\Http\Middleware\StudentCheck;
use App\Http\Middleware\MethodologistCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->middleware(['auth', 'verified', StudentCheck::class])->name('student.dashboard');

Route::get('/department/dashboard', function () {
    return view('department.dashboard');
})->middleware(['auth', 'verified', DepartmentCheck::class])->name('department.dashboard');

Route::get('/dean/dashboard', function () {
    return view('dean.dashboard');
})->middleware(['auth', 'verified', DeanCheck::class])->name('dean.dashboard');

Route::get('/methodologist/dashboard', function () {
    return view('methodologist.dashboard');
})->middleware(['auth', 'verified', MethodologistCheck::class])->name('methodologist.dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
