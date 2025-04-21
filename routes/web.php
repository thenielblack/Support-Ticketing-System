<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/support-request', [SupportRequestController::class, 'create'])->name('support-request.create');
Route::post('/support-request', [SupportRequestController::class, 'store'])->name('support-request.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/support-request-list', [SupportRequestController::class, 'index'])->name('support-request.index');
});

require __DIR__ . '/auth.php';
