<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Redirection racine vers login
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes publiques (accessibles sans authentification)
Route::middleware(['guest'])->group(function () {

    // Routes d'authentification
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Routes de réinitialisation du mot de passe
    Route::get('/password/forgot', [AuthController::class, 'showForgotPassword'])->name('password.forgot');
    Route::post('/password/forgot', [AuthController::class, 'forgotPassword'])->name('password.forgot');
});

// Routes protégées (requièrent authentification)
Route::middleware(['auth'])->group(function () {
    // Routes de l'application
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    // Route pour la déconnexion
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
