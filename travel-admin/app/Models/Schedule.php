<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules'; // Nama tabel di database

    protected $fillable = [
        'name',
        'destination',
        'description',
        'price',
        'departure_time',
        'passenger_quota',
        'passenger_count',
        'image'
    ];

    // Relasi dengan Booking (One-to-Many)
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
