<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa2', [MahasiswaController::class, 'tampil']);

Route::get('/nilai', [MahasiswaController::class, 'nilai']);
