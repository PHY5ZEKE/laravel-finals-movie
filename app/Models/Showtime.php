<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $primaryKey = 'showtime_id';

    protected $table = 'showtimes';

    protected $fillable = [
        'movie_id',
        'theater_id',
        'show_date',
        'show_time',
        'available_seats'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_id');
    }
}
