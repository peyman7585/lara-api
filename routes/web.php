<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckEmailStatus;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::prefix('auth')->group(function (){
    Route::get('register',[RegisterController::class,'show'])->name('show.register');
    Route::post('register',[RegisterController::class,'store'])->name('store.register');
    Route::get('login',[LoginController::class,'show'])->name('show.login');
    Route::post('login',[LoginController::class,'store'])->name('store.login');
    Route::get('logout',[LoginController::class,'logout'])->name('auth.logout');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
