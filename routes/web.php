<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseEnrollmentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

//User Routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

//Course Routes
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/delete/{id}', [CourseController::class, 'delete'])->name('courses.delete');



//Enrollment Routes
Route::get('/enrollments', [CourseEnrollmentController::class, 'index'])->name('enrollments.index');
Route::get('/enrollments/create/{course}', [CourseEnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('/enrollments', [CourseEnrollmentController::class, 'store'])->name('enrollments.store');
Route::get('/enrollments/edit/{id}', [CourseEnrollmentController::class, 'edit'])->name('enrollments.edit');
Route::put('/enrollments/update/{id}', [CourseEnrollmentController::class, 'update'])->name('enrollments.update');
Route::delete('/enrollments/delete/{id}', [CourseEnrollmentController::class, 'delete'])->name('enrollments.delete');
