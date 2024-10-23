<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    protected $primaryKey = 'theater_id';
    protected $table = 'theaters';

    protected $fillable = [
        'name',
        'location',
        'capacity'
    ];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class, 'theater_id');
    }
}
