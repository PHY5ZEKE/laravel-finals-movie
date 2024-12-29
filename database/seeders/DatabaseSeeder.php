<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use App\Models\Theater;
use App\Models\Showtime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Inception',
                'genre' => 'Sci-Fi',
                'duration' => 148,
                'releaseDate' => '2010-07-16',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
                'posterPath' => '',
            ],
            [
                'title' => 'The Dark Knight',
                'genre' => 'Action',
                'duration' => 152,
                'releaseDate' => '2008-07-18',
                'description' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.',
                'posterPath' => '',
            ],
            [
                'title' => 'Interstellar',
                'genre' => 'Sci-Fi',
                'duration' => 169,
                'releaseDate' => '2014-11-07',
                'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'posterPath' => '',
            ],
            [
                'title' => 'The Matrix',
                'genre' => 'Sci-Fi',
                'duration' => 136,
                'releaseDate' => '1999-03-31',
                'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
                'posterPath' => '',
            ],
            [
                'title' => 'Gladiator',
                'genre' => 'Action',
                'duration' => 155,
                'releaseDate' => '2000-05-05',
                'description' => 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.',
                'posterPath' => '',
            ],
            [
                'title' => 'Titanic',
                'genre' => 'Romance',
                'duration' => 195,
                'releaseDate' => '1997-12-19',
                'description' => 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.',
                'posterPath' => '',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }

        $users = [
            [
                'name' => 'Ezequiel Gonzalez',
                'email' => 'ezequiel@example.com',
                'password' => Hash::make('password@123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Nicole Oraya',
                'email' => 'nicole@example.com',
                'password' => Hash::make('password@123'),
                'role' => 'employee',
            ],
            [
                'name' => 'Rico Nieto',
                'email' => 'rico@example.com',
                'password' => Hash::make('password@123'),
                'role' => 'employee',
            ],
            [
                'name' => 'Gelo Filomeno',
                'email' => 'gelo@example.com',
                'password' => Hash::make('password@123'),
                'role' => 'customer',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

     

    }
}