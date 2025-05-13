<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registration;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;
    
    protected $table = 'events';

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
