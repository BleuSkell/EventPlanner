<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Registration;

class DashboardController extends Controller
//haalt kernstatistieken op zoals het totaal aantal gebruikers,
    //  evenementen, en registraties. Daarnaast worden de eerstvolgende vijf
    //  aankomende evenementen opgehaald, gesorteerd op datum.
{
    public function index()
    {
    
        return view('dashboard', [
            // Totaal aantal geregistreerde gebruikers
            'totalUsers' => User::count(),
            // Totaal aantal aangemaakte evenementen
            'totalEvents' => Event::count(),
                // Totaal aantal inschrijvingen op evenementen
            'totalRegistrations' => Registration::count(),
             // Eerstvolgende 5 evenementen vanaf vandaag, gesorteerd op datum
            'upcomingEvents' => Event::whereDate('date', '>=', now())
                                      ->orderBy('date')
                                      ->take(5)
                                      ->get(),
        ]);
    }
}
