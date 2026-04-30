<?php

use App\Http\Controllers\MessageController;
use App\Models\Message;
use Illuminate\Support\Facades\Inertia;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::get('chat', function () {
        return \Inertia\Inertia::render('Chat', [
            'messages' => Message::query()
                ->with('user')
                ->latest()
                ->take(50)
                ->get()
                ->reverse()
                ->values(),
        ]);
    })->name('chat');
});

Route::post('messages', [MessageController::class, 'store'])
    ->middleware('auth')
    ->name('messages.store');

require __DIR__.'/settings.php';
