<?php

namespace App\Http\Controllers;

use App\Models\Movie;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::paginate(5);

        // search query
        $search = $request->input("search");

        if ($search) {
            $movies = Movie::where("title", "like", "%$search%")
                ->orWhere("genre", "like", "%$search%")
                ->orWhere("duration", "like", "%$search%")
                ->orWhere("releaseDate", "like", "%$search%")
                ->orWhere("description", "like", "%$search%")
                ->paginate(5);
        } else {
            $movies = Movie::paginate(5);
        }

        return view('management.movie.index', ['movies' => $movies]);
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
            'poster-path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('poster-path')) {
            $file = $request->file('poster-path');
            $filePath = $file->store('posters', 'public');
        }

        Movie::create($request->only(['title', 'genre', 'duration', 'releaseDate', 'description', $filePath ?? null]));

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
            'poster-path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $movie->update($request->only(['title', 'genre', 'duration', 'releaseDate', 'description', 'poster-path']));

        return redirect()->route('management.movie.show', $movie->movie_id);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('management.movie.index');
    }
}
