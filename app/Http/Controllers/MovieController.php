<?php

namespace App\Http\Controllers;
use App\Models\Movie;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::simplePaginate(5);

        return view('management.movie.index',['movies'=>$movies]);
    }

    public function create()
    {
        return view('management.movie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|numeric|min:1',
            'releaseDate' => 'required|date',
            'description' => 'required|string',
        ]);

        Movie::create($request->only(['title', 'genre', 'duration', 'releaseDate', 'description']));

        return redirect()->route('management.movie.index');
    }

    public function show(Movie $movie)
    {
        return view('management.movie.show', ['movie' => $movie]);
    }

    public function edit(Movie $movie)
    {
        return view('management.movie.edit', ['movie' => $movie]);
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|numeric|min:1',
            'releaseDate' => 'required|date',
            'description' => 'required|string',
        ]);

        $movie->update($request->only(['title', 'genre', 'duration', 'releaseDate', 'description']));

        return redirect()->route('management.movie.show', $movie->movie_id);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('management.movie.index');
    }

   
}
