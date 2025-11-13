<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\NotulenController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserController;






Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/profil', [AuthController::class, 'profil'])->name('profil');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Data Anggota
Route::get('/data_anggota', [DataAnggotaController::class, 'index'])->name('data_anggota.index');
Route::get('/data_anggota/create', [DataAnggotaController::class, 'create'])->name('data_anggota.create');
Route::post('/data_anggota', [DataAnggotaController::class, 'store'])->name('data_anggota.store');
Route::get('/data_anggota/{id}/edit', [DataAnggotaController::class, 'edit'])->name('data_anggota.edit');
Route::put('/data_anggota/{id}', [DataAnggotaController::class, 'update'])->name('data_anggota.update');
Route::delete('/data_anggota/{id}', [DataAnggotaController::class, 'destroy'])->name('data_anggota.destroy');

// CRUD Rapat
Route::get('/rapat', [AdminController::class, 'rapat'])->name('rapat.index');
Route::get('/rapat/create', [AdminController::class, 'createRapat'])->name('rapat.create');
Route::post('/rapat', [AdminController::class, 'storeRapat'])->name('rapat.store');
Route::get('/rapat/{id}/edit', [AdminController::class, 'editRapat'])->name('rapat.edit');
Route::put('/rapat/{id}', [AdminController::class, 'updateRapat'])->name('rapat.update');
Route::delete('/rapat/{id}', [AdminController::class, 'destroyRapat'])->name('rapat.destroy');

//program
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create');
Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
Route::get('/program/{id}', [ProgramController::class, 'show'])->name('program.show');


// Evaluasi Routes
Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi.index');
Route::get('/evaluasi/create', [EvaluasiController::class, 'create'])->name('evaluasi.create');
Route::post('/evaluasi', [EvaluasiController::class, 'store'])->name('evaluasi.store');
Route::get('/evaluasi/{id}/edit', [EvaluasiController::class, 'edit'])->name('evaluasi.edit');
Route::put('/evaluasi/{id}', [EvaluasiController::class, 'update'])->name('evaluasi.update');
Route::delete('/evaluasi/{id}', [EvaluasiController::class, 'destroy'])->name('evaluasi.destroy');

//notulen
Route::get('/notulen', [NotulenController::class, 'index'])->name('notulen.index');
Route::get('/notulen/create', [NotulenController::class, 'create'])->name('notulen.create');
Route::post('/notulen', [NotulenController::class, 'store'])->name('notulen.store');
Route::get('/notulen/{id}/edit', [NotulenController::class, 'edit'])->name('notulen.edit');
Route::put('/notulen/{id}', [NotulenController::class, 'update'])->name('notulen.update');
Route::delete('/notulen/{id}', [NotulenController::class, 'destroy'])->name('notulen.destroy');
Route::get('/notulen/{id}', [NotulenController::class, 'show'])->name('notulen.show');


// 🔹 User: Anggota
Route::get('/user/anggota', [UserController::class, 'anggota'])->name('user.anggota');
// 🔹 User: Rapat
Route::get('/user/rapat', [UserController::class, 'rapat'])->name('user.rapat');
Route::get('/user/program', [UserController::class, 'program'])->name('user.program');
Route::get('/user/evaluasi', [UserController::class, 'evaluasi'])->name('user.evaluasi');
 Route::get('/user/notulen', [UserController::class, 'notulen'])->name('notulen');








