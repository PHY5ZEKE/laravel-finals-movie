<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Movie::create([
            'title' => 'Inception',
            'genre' => 'Sci-Fi',
            'duration' => 148,
            'releaseDate' => '2010-07-16',
            'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
            'poster-path' => '',
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'genre' => 'Action',
            'duration' => 152,
            'releaseDate' => '2008-07-18',
            'description' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.',
            'poster-path' => '',
        ]);

        Movie::create([
            'title' => 'Interstellar',
            'genre' => 'Adventure',
            'duration' => 169,
            'releaseDate' => '2014-11-07',
            'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
            'poster-path' => '',
        ]);
    }
}
