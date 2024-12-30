<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showtime;

class CustomerController extends Controller
{
    public function index()
    {
        $movies = Showtime::where('show_date', '>', now())
            ->select('movie_id')
            ->selectRaw('count(movie_id) as count')
            ->groupBy('movie_id')
            ->orderBy('count', 'desc')
            ->with(['movie' => function ($query) {
                $query->select('movie_id', 'title', 'genre', 'posterPath');
            }])
            ->get();

        return view('dashboard', [
            'movies' => $movies,
        ]);
    }
}
