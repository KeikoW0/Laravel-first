<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminKontakController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminGuardianController;
use App\Http\Controllers\Admin\AdminClassroomController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminSubjectController;

Route::get('/', [ProfilController::class, 'index']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/contact', [KontakController::class, 'kontak']);
Route::get('/profile', [profilController::class, 'profil']);
Route::get('/student', [StudentController::class, 'index']);
Route::resource('guardians', App\Http\Controllers\GuardianController::class);
Route::resource('students', App\Http\Controllers\StudentController::class);
// Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::get('/classrooms', [App\Http\Controllers\ClassroomController::class, 'index']);
Route::get('/teachers', [App\Http\Controllers\TeacherController::class, 'index']);
Route::get('/subjects', [App\Http\Controllers\SubjectController::class, 'index']);

// Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index']);
Route::get('/admin/profil', [App\Http\Controllers\Admin\AdminProfilController::class, 'index']);
Route::get('/admin/kontak', [App\Http\Controllers\Admin\AdminKontakController::class, 'index']);

Route::get('/admin/students', [App\Http\Controllers\Admin\AdminStudentController::class, 'index'])->name('admin.student.index');
Route::post('/admin/students', [App\Http\Controllers\Admin\AdminStudentController::class, 'store'])->name('admin.student.store');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('student', \App\Http\Controllers\Admin\AdminStudentController::class);
});

Route::get('/admin/guardians', [App\Http\Controllers\Admin\AdminGuardianController::class, 'index'])->name('admin.guardian.index');
Route::post('/admin/guardians', [App\Http\Controllers\Admin\AdminGuardianController::class, 'store'])->name('admin.guardian.store');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('guardian', \App\Http\Controllers\Admin\AdminGuardianController::class);
});

Route::get('/admin/classrooms', [App\Http\Controllers\Admin\AdminClassroomController::class, 'index'])->name('admin.classroom.index');
Route::post('/admin/classrooms', [App\Http\Controllers\Admin\AdminClassroomController::class, 'store'])->name('admin.classroom.store');
Route::put('/admin/classrooms/{classroom}', [App\Http\Controllers\Admin\AdminClassroomController::class, 'update'])->name('admin.classroom.update');


Route::get('/admin/teachers', [App\Http\Controllers\Admin\AdminTeacherController::class, 'index'])->name('admin.teacher.index');
Route::post('/admin/teachers', [App\Http\Controllers\Admin\AdminTeacherController::class, 'store'])->name('admin.teacher.store');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('teacher', AdminTeacherController::class);
});

Route::get('/admin/subjects', [App\Http\Controllers\Admin\AdminSubjectController::class, 'index'])->name('admin.subject.index');
Route::post('/admin/subjects', [App\Http\Controllers\Admin\AdminSubjectController::class, 'store'])->name('admin.subject.store');
Route::put('/admin/subjects/{subject}', [App\Http\Controllers\Admin\AdminSubjectController::class, 'update'])->name('admin.subject.update');

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
//     Route::get('/profil', [AdminProfilController::class, 'index'])->name('profil');
//     Route::get('/kontak', [AdminKontakController::class, 'index'])->name('kontak');
// });

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home'
    ]);
})->name('home');
