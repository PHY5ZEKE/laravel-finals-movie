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

    public function index_customer(Request $request)
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

        return view('customer.movie.index', ['movies' => $movies]);
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
            'posterPath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('posterPath')) {
            $file = $request->file('posterPath');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->move(public_path('poster'), $fileName);
        }

        Movie::create(array_merge(
            $request->only(['title', 'genre', 'duration', 'releaseDate', 'description']),
            ['posterPath' => 'poster/' . $fileName]
        ));

        return redirect()->route('management.movie.index');
    }

    public function show(Movie $movie)
    {
        return view('management.movie.show', ['movie' => $movie]);
    }
    
    public function show_customer(Movie $movie)
    {
        return view('customer.movie.show', ['movie' => $movie]);
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
            'posterPath' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('posterPath')) {
            $file = $request->file('posterPath');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->move(public_path('poster'), $fileName);
            $movie->posterPath = 'poster/' . $fileName;
        }

        $movie->update($request->only(['title', 'genre', 'duration', 'releaseDate', 'description']));

        if (isset($filePath)) {
            $movie->posterPath = 'poster/' . $fileName;
            $movie->save();
        }

        return redirect()->route('management.movie.show', $movie->movie_id);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('management.movie.index');
    }
}
