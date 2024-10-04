<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Rotas do perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas personalizadas para eventos
    Route::get('events/upcoming', [EventController::class, 'upcoming'])->name('events.upcoming');
    Route::get('events/completed', [EventController::class, 'completed'])->name('events.completed');
    Route::put('/events/{id}', [EventController::class, 'update']);

    // Rota resource (exceto 'show' se não for necessária)
    Route::resource('events', EventController::class)->except(['show']);
});

require __DIR__ . '/auth.php';
