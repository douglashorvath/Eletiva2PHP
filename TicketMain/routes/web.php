<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StatsController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {

    // Rotas do perfil do usuário
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rotas para eventos
    Route::prefix('events')->group(function () {
        Route::get('upcoming', [EventController::class, 'upcoming'])->name('events.upcoming');
        Route::get('completed', [EventController::class, 'completed'])->name('events.completed');
        Route::get('{event}/lectures', [EventController::class, 'lectures'])->name('events.lectures');
    });
    Route::resource('events', EventController::class)->except(['show']);

    // Rotas para participantes
    Route::resource('participants', ParticipantController::class);

    // Rotas para palestras
    Route::prefix('lectures')->group(function () {
        Route::get('create', [LectureController::class, 'create'])->name('lectures.create'); // Permite `event_id`
        Route::get('{lecture}', [LectureController::class, 'show'])->name('lectures.show');
        Route::post('{lecture}/register', [LectureController::class, 'registerParticipant'])->name('lectures.register');
    });
    Route::resource('lectures', LectureController::class)->except(['create']);

    // Rotas para inscrições
    Route::prefix('lectures/{lecture}/registrations')->group(function () {
        Route::get('create', [RegistrationController::class, 'create'])->name('registrations.create');
        Route::post('/', [RegistrationController::class, 'store'])->name('registrations.store');
        Route::delete('{participant}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');
    });

    // Rotas para estatísticas
    Route::get('stats', [StatsController::class, 'index'])->name('stats.index');
});

require __DIR__ . '/auth.php';
