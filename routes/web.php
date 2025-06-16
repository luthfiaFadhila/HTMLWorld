<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AboutController;

// ===== ROUTE UTAMA =====
Route::get('/', function () {
    return view('home'); // Halaman utama
})->name('home');

// ===== AUTH ROUTES =====
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ===== ROUTE PERMAINAN (LOGIN DULU) =====
Route::middleware('auth')->group(function () {

    // Halaman utama daftar level
    Route::get('/game', [GameController::class, 'index'])->name('game.levels');

    // Halaman play awal (opsional)
    Route::get('/play', [GameController::class, 'play'])->name('game.play');

    // Leaderboard
    Route::get('/leaderboard', [GameController::class, 'leaderboard'])->name('game.leaderboard');


    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/{id}', [MateriController::class, 'show'])->name('materi.detail');


    // Pilih Level (daftar level)
    Route::get('/level', [GameController::class, 'showLevelPage'])->name('level.pilih');

    // Cerita Level / Intro
    Route::get('/game/level/{id}/intro', [GameController::class, 'showIntro'])->name('game.intro');

    // Main Level (soal + output)
    Route::get('/game/level/{id}', [GameController::class, 'showLevel'])->name('game.level');

    Route::get('/game/level/{id}/reset', [GameController::class, 'resetLevel'])->name('game.reset');
    Route::get('/level/{id}/reset-back', [GameController::class, 'resetAndBack'])->name('game.reset.back');

    // Submit Jawaban (AJAX)
    Route::post('/level/{id}/submit', [GameController::class, 'submit'])->name('game.submit');
});

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

