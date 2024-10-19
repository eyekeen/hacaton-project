<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MethodologistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\DeanCheck;
use App\Http\Middleware\DepartmentCheck;
use App\Http\Middleware\StudentCheck;
use App\Http\Middleware\MethodologistCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/department/dashboard', function () {
    return view('department.dashboard');
})->middleware(['auth', 'verified', DepartmentCheck::class])->name('department.dashboard');

Route::get('/dean/dashboard', function () {
    return view('dean.dashboard');
})->middleware(['auth', 'verified', DeanCheck::class])->name('dean.dashboard');

Route::get('/methodologist/dashboard', function () {
    return view('methodologist.dashboard');
})->middleware(['auth', 'verified', MethodologistCheck::class])->name('methodologist.dashboard');

Route::get('/upload', [DocumentController::class, 'create'])->name('file.upload');
Route::post('/upload', [DocumentController::class, 'store'])->name('file.upload');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', StudentCheck::class])->prefix('student')->group(function () {

    Route::get('/mypetitions', [StudentController::class, 'mypetitions'])->name('student.mypetitions');

    Route::get('/sendpetition', [StudentController::class, 'sendpetition'])->name('student.sendpetition');

    Route::post('/sendpetition', [StudentController::class, 'store'])->name('student.sendpetition.store');
});


Route::middleware(['auth', MethodologistCheck::class])->prefix('methodologist')->group(function () {
    Route::get('/sentpetitions', [MethodologistController::class, 'sentpetitions'])->name('methodologist.sentpetitions');
    Route::post('/acceptpetition', [MethodologistController::class, 'acceptpetition'])->name('methodologist.acceptpetition');
    Route::post('/declinepetition', [MethodologistController::class, 'declinepetition'])->name('methodologist.declinepetition');
});


require __DIR__ . '/auth.php';
