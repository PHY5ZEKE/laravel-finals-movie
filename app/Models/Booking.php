<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_id';

    protected $table = 'bookings';

    protected $fillable = [
        'showtime_id',
        'user_id',
        'booking_date',
        'num_tickets',
        'movie_id',
        'seats',
    ];

    protected $casts = [
        'seats' => 'array', // Cast seat_id to array
    ];

    public function showtime()
    {
        return $this->belongsTo(Showtime::class, 'showtime_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
