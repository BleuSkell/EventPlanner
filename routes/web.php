<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

require __DIR__.'/auth.php';
