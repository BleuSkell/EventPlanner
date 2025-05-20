<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalUsers' => User::count(),
            'totalEvents' => Event::count(),
            'totalRegistrations' => Registration::count(),
            'upcomingEvents' => Event::whereDate('date', '>=', now())
                                      ->orderBy('date')
                                      ->take(5)
                                      ->get(),
        ]);
    }
}
