<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Showtime;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
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

        return redirect()->route('customer.showtime.index')->with('success', 'Booking successful!');
    }
}
    

