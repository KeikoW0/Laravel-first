<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;

Route::get('/', [ProfilController::class, 'index']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/contact', [KontakController::class, 'kontak']);
Route::get('/profile', [profilController::class, 'profil']);
Route::get('/student', [StudentController::class, 'index']);
Route::resource('guardians', App\Http\Controllers\GuardianController::class);
Route::resource('students', App\Http\Controllers\StudentController::class);
Route::get('/classrooms', [ClassroomController::class, 'index']);