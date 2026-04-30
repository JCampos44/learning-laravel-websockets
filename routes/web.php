<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::inertia('chat', 'Chat')->name('chat');
});

Route::post('messages', [MessageController::class, 'store'])
    ->middleware('auth')
    ->name('messages.store');

require __DIR__.'/settings.php';
