<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Registration;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Event::factory(10)->create();

        // Create 10 registrations for each user
        User::all()->each(function ($user) {
            Registration::factory(10)->create([
                'userId' => $user->id,
                'eventIid' => Event::inRandomOrder()->first()->id,
            ]);
        });
    }
}
