<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;

Route::get('/', [ProfilController::class, 'index']);
Route::get('/contact', [ProfilController::class, 'contact']);
Route::get('/home', function () {
    return view('home');
});
Route::get('/profile', function () {
    return view('profile', [
        'nama' => 'Keiko Shafira Wiyana',
        'kelas' => 'XI PPLG 1',
        'sekolah' => 'SMK Raden Umar Said'
    ]);
})->name('profile');

