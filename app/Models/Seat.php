<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $table = 'seats';
    protected $primaryKey = 'seat_id';

    protected $fillable = [
        'theater_id',
        'seat_number',
        'seat_status',
    ];

    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'seat_id');
    }
}