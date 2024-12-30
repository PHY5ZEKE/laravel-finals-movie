<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Showtime;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\LogHelper;


class BookingController extends Controller
{

    public function index(Request $request)
    {
        // search query
        $search = $request->input("search");

        if ($search) {
            $bookings = Booking::with(['showtime.movie', 'showtime.theater', 'user'])
                ->whereHas('showtime.movie', function ($query) use ($search) {
                    $query->where("title", "like", "%$search%")
                        ->orWhere("genre", "like", "%$search%");
                })
                ->orWhereHas('showtime.theater', function ($query) use ($search) {
                    $query->where("name", "like", "%$search%")
                        ->orWhere("location", "like", "%$search%");
                })
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where("name", "like", "%$search%")
                        ->orWhere("email", "like", "%$search%");
                })
                ->orWhere("created_at", "like", "%$search%")
                ->simplePaginate(5);
        } else {
            $bookings = Booking::with(['showtime.movie', 'showtime.theater', 'user'])->simplePaginate(5);
        }

        return view('management.booking.index', compact('bookings'));
    }

    public function index_customer(Request $request)
    {
        // search query
        $search = $request->input("search");

        if ($search) {
            $bookings = Booking::with(['showtime.movie', 'showtime.theater', 'user'])
                ->where('user_id', Auth::id())
                ->where(function ($query) use ($search) {
                    $query->whereHas('showtime.movie', function ($query) use ($search) {
                        $query->where("title", "like", "%$search%")
                            ->orWhere("genre", "like", "%$search%");
                    })
                        ->orWhereHas('showtime.theater', function ($query) use ($search) {
                            $query->where("name", "like", "%$search%")
                                ->orWhere("location", "like", "%$search%");
                        })
                        ->orWhere("created_at", "like", "%$search%");
                })
                ->simplePaginate(5);
        } else {
            $bookings = Booking::with(['showtime.movie', 'showtime.theater', 'user'])
                ->where('user_id', Auth::id())
                ->simplePaginate(5);
        }

        return view('customer.booking.index', compact('bookings'));
    }

    public function create($showtime_id)
    {
        $showtime = Showtime::with(['movie', 'theater'])->findOrFail($showtime_id);
        $seats = Seat::where('theater_id', $showtime->theater_id)->get();

        return view('customer.booking.create', compact('showtime', 'seats'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,showtime_id',
            'num_tickets' => 'required|integer|min:1',
            'seats' => 'required|array',
            'seats.*' => 'exists:seats,seat_id',
        ]);

        $showtime = Showtime::findOrFail($request->showtime_id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to book a showtime.');
        }

        // Create the booking
        $booking = Booking::create([
            'showtime_id' => $showtime->showtime_id,
            'user_id' => $user->user_id,
            'booking_date' => now(),
            'num_tickets' => $request->num_tickets,
            'movie_id' => $showtime->movie_id,
            'seats' => json_encode($request->seats), // Store seats as JSON
        ]);

        // Update seat status
        Seat::whereIn('seat_id', $request->seats)->update(['seat_status' => 'booked']);

        // Log the action
        LogHelper::logAction('create_booking', 'Created booking for showtime ID: ' . $request->showtime_id . ' by user ID: ' . $user->user_id);

        return redirect()->route('customer.showtime.index')->with('success', 'Booking successful!');
    }
}
