<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/register-event', function(Request $request) {
    $request->validate([
        'event_id' => 'required|integer',
        'time' => 'required|string',
    ]);

    // Check if the user already registered for this time slot
    $exists = DB::table('registrations')
        ->where('userId', Auth::id())
        ->where('time', $request->time)
        ->exists();

    if ($exists) {
        return back()->withErrors(['time' => 'U heeft zich al ingeschreven voor dit tijdslot.']);
    }

    DB::table('registrations')->insert([
        'userId' => Auth::id(),
        'eventIid' => $request->event_id,
        'time' => $request->time,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $successKey = match($request->event_id) {
        1 => 'success_auto',
        2 => 'success_motor',
        3 => 'success_huizen',
        default => 'success',
    };

    return back()->with($successKey, 'Inschrijving succesvol verwerkt!');
})->middleware('auth')->name('register-event');

Route::get('/Register-event', function () {
    return view('Register-event.index');
})->middleware(['auth', 'verified'])->name('Register-event');

Route::get('/registrations', function () {
    $registrations = DB::table('registrations')
        ->where('userId', Auth::id())
        ->orderBy('time')
        ->get();

    // Event titels per id (pas aan indien nodig)
    $eventTitles = [
        1 => 'Quia veniam repellat odit.',
        2 => 'Culpa cumque modi quas accusamus.',
        3 => 'Enim debitis suscipit.',
        4 => 'Odio quo consequatur.',
        5 => 'Sit dicta velit quis laboriosam',
        6 => 'Nulla sit ut vel.',
        7 => 'Rerum placeat sed quo.',
        8 => 'Qui qui hic dolorem.',
        9 => 'Facilis enim qui.',
        10 => 'Doloremque accusantium reprehenderit.',
    ];

    return view('registrations.overview', compact('registrations', 'eventTitles'));
})->middleware(['auth', 'verified'])->name('registrations.overview');

Route::delete('/registrations/{id}', function ($id) {
    DB::table('registrations')
        ->where('id', $id)
        ->where('userId', Auth::id())
        ->delete();

    return back()->with('success', 'Inschrijving succesvol geannuleerd.');
})->middleware(['auth', 'verified'])->name('registrations.cancel');

require __DIR__.'/auth.php';
require __DIR__.'/event.php';