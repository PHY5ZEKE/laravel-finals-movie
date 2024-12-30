<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Theater;
use App\Models\User;
use App\Models\Movie;

class ManagementController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $theaters = Theater::paginate(5);
        $bookings = Booking::all();
        $users = User::paginate(5);

        // Popular Movie Titles based on Bookings and get the title from Movies
        $popularMovies = Booking::select('movie_id')
            ->selectRaw('count(movie_id) as count')
            ->groupBy('movie_id')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->with(['movie' => function ($query) {
                $query->select('movie_id', 'title', 'genre', 'posterPath');
            }])
            ->get();

        return view('management.dashboard', [
            'movies' => $movies,
            'theaters' => $theaters,
            'bookings' => $bookings,
            'users' => $users,
            'popularMovies' => $popularMovies
        ]);
    }
}
