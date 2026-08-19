<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseEnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('auth.form');
Route::post('/login', [LoginController::class, 'store'])->name('auth.submit');

Route::middleware(['check'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    //User Routes
    Route::resource('users', UserController::class);

    //Course Routes
    Route::resource('courses', CourseController::class);



    //Enrollment Routes
    Route::get('/enrollments', [CourseEnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/enrollments/create/{course}', [CourseEnrollmentController::class, 'create'])->name('enrollments.create');
    Route::post('/enrollments', [CourseEnrollmentController::class, 'store'])->name('enrollments.store');
    Route::get('/enrollments/edit/{id}', [CourseEnrollmentController::class, 'edit'])->name('enrollments.edit');
    Route::put('/enrollments/update/{id}', [CourseEnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('/enrollments/delete/{id}', [CourseEnrollmentController::class, 'delete'])->name('enrollments.delete');

    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    
    Route::get('/profile', [LoginController::class, 'profile'])->name('auth.profile');

    Route::put('/profile/update', [LoginController::class, 'updateProfile'])->name('profile.update');

    Route::put('/profile/change-password', [LoginController::class, 'changePassword'])->name('profile.password');


    
});
