<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;
use App\Helper\LogHelper;

class ShowtimeController extends Controller
{
    public function index(Request $request)
    {
        // search query
        $search = $request->input("search");

        if ($search) {
            $showtimes = Showtime::with(['movie', 'theater'])
                ->where('show_date', '>', now())
                ->whereHas('movie', function ($query) use ($search) {
                    $query->where("title", "like", "%$search%")
                        ->orWhere("genre", "like", "%$search%");
                })
                ->orWhereHas('theater', function ($query) use ($search) {
                    $query->where("name", "like", "%$search%")
                        ->orWhere("location", "like", "%$search%");
                })
                ->orWhere("show_date", "like", "%$search%")
                ->orWhere("show_time", "like", "%$search%")
                ->simplePaginate(5);
        } else {
            $showtimes = Showtime::with(['movie', 'theater'])
                ->where('show_date', '>', now())
                ->simplePaginate(5);
        }

        return view('management.showtime.index', ['showtimes' => $showtimes]);
    }

    public function index_customer(Request $request)
    {
        // search query
        $search = $request->input("search");

        if ($search) {
            $showtimes = Showtime::with(['movie', 'theater'])
                ->where('show_date', '>', now())
                ->whereHas('movie', function ($query) use ($search) {
                    $query->where("title", "like", "%$search%")
                        ->orWhere("genre", "like", "%$search%");
                })
                ->orWhereHas('theater', function ($query) use ($search) {
                    $query->where("name", "like", "%$search%")
                        ->orWhere("location", "like", "%$search%");
                })
                ->orWhere("show_date", "like", "%$search%")
                ->orWhere("show_time", "like", "%$search%")
                ->simplePaginate(5);
        } else {
            $showtimes = Showtime::with(['movie', 'theater'])
                ->where('show_date', '>', now())
                ->simplePaginate(5);
        }

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

        $showtime = Showtime::create([
            'movie_id' => $request->movie_id,
            'theater_id' => $request->theater_id,
            'show_date' => $request->show_date,
            'show_time' => $request->show_time,
            'available_seats' => $theater->capacity,
        ]);

        // Log the action
        LogHelper::logAction('create_showtime', 'Created showtime for movie ID: ' . $request->movie_id . ' in theater ID: ' . $request->theater_id);

        return redirect()->route('management.showtime.index')->with('success', 'Showtime created successfully.');
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

        // Log the action
        LogHelper::logAction('delete_showtime', 'Deleted showtime ID: ' . $id);

        return redirect()->route('management.showtime.index')->with('success', 'Showtime deleted successfully.');
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

        // Log the action
        LogHelper::logAction('update_showtime', 'Updated showtime ID: ' . $id);

        return redirect()->route('management.showtime.index')->with('success', 'Showtime updated successfully.');
    }
}
