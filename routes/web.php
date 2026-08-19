<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseEnrollmentController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('auth.form');
Route::post('/login', [LoginController::class, 'store'])->name('auth.submit');

// Protected Routes
Route::middleware(['check'])->group(function () {

    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('home');

    //User Routes
    Route::resource('users', UserController::class);

    //Course Routes
    Route::resource('courses', CourseController::class);

    //Enrollment Routes
    Route::resource('enrollments', CourseEnrollmentController::class)->except(['create']);

    // Custom enrollment creation route
    Route::get(
    '/enrollments/create/{course}',
    [CourseEnrollmentController::class, 'create'])->name('enrollments.create');

    // Profile Routes
    Route::get('/profile', [LoginController::class, 'profile'])->name('auth.profile');

    Route::put('/profile/update', [LoginController::class, 'updateProfile'])->name('profile.update');

    Route::put('/profile/change-password', [LoginController::class, 'changePassword'])->name('profile.password');


    // Logout Route
    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    
});
