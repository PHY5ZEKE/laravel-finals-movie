<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'title',
        'genre',
        'duration',
        'releaseDate',
        'description',
        'posterPath'
    ];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class, 'movie_id');
    }
}
