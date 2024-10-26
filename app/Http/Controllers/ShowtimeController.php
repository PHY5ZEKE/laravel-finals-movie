<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function index()
    {
        $showtimes = Showtime::with(['movie', 'theater'])->simplePaginate(5);

        return view('management.showtime.index', ['showtimes' => $showtimes]);
    }

    public function index_customer()
    {
        $showtimes = Showtime::with(['movie', 'theater'])->simplePaginate(5);

        return view('customer.showtime.index', ['showtimes' => $showtimes]);
    }

    public function show_customer($id)
    {
        $showtime = Showtime::with(['movie', 'theater'])->findOrFail($id);

        return view('customer.showtime.show', compact('showtime'));   
    }

    public function create()
    {
        $movies = Movie::all();
        $theaters = Theater::all();
        return view('management.showtime.create', compact('movies', 'theaters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|numeric|min:1',
            'theater_id' => 'required|numeric|min:1',
            'show_date' => 'required|date|after:today',
            'show_time' => 'required|date_format:H:i',
        ]);

        $theater = Theater::findOrFail($request->theater_id);

        Showtime::create([
            'movie_id' => $request->movie_id,
            'theater_id' => $request->theater_id,
            'show_date' => $request->show_date,
            'show_time' => $request->show_time,
            'available_seats' => $theater->capacity,
        ]);

        return redirect()->route('management.showtime.index');
    }

    public function show($id)
    {
        $showtime = Showtime::with(['movie', 'theater'])->findOrFail($id);

        return view('management.showtime.show', compact('showtime'));   
    }

    public function destroy($id)
    {
        $showtime = Showtime::findOrFail($id);
        $showtime->delete();

        return redirect()->route('management.showtime.index');
    }
    public function edit($id)
    {
        $showtime = Showtime::with(['movie', 'theater'])->findOrFail($id);
        $movies = Movie::all();
        $theaters = Theater::all();

        return view('management.showtime.edit', compact('showtime', 'movies', 'theaters'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'movie_id' => 'required|numeric|min:1',
            'theater_id' => 'required|numeric|min:1',
            'show_date' => 'required|date|after:today',
            'show_time' => 'required|date_format:H:i',
        ]);

        $showtime = Showtime::findOrFail($id);
        $theater = Theater::findOrFail($request->theater_id);

        $showtime->update([
            'movie_id' => $request->movie_id,
            'theater_id' => $request->theater_id,
            'show_date' => $request->show_date,
            'show_time' => $request->show_time,
            'available_seats' => $theater->capacity,
        ]);

        return redirect()->route('management.showtime.index');
    }

    
}   