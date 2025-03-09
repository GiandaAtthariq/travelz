<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Booking extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'user_id',
        'schedule_id',
        'booking_date',
        'total_price',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id');
    }
}
