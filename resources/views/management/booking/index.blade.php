<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-xl md:text-3xl mb-5 text-red-600">Bookings</h1>
                   
                    <div class="space-y-4">
                        <form id="search-form" class="space-y-4" action="{{ route('management.booking.index') }}" method="GET">
                            <input type="text" name="search" id="search"
                                class="w-full border-2 border-neutral-700 focus:border-red-600 focus:ring-red-500 rounded-lg shadow-sm"
                                placeholder="Search for bookings" value="">
                        </form>
                        @foreach ($bookings as $booking)
                            <div class="block px-4 py-6 border-2 border-neutral-700  rounded-lg shadow-sm">
                                <h2 class="text-xl font-bold text-red-600">Booking ID: {{ $booking->booking_id }}</h2>
                                <p class="text-neutral-400"><strong>Showtime:</strong>
                                    {{ $booking->showtime->movie->title }} at {{ $booking->showtime->theater->name }}
                                    ({{ $booking->showtime->theater->location }}) on {{ $booking->showtime->show_date }}
                                    at {{ $booking->showtime->show_time }}</p>
                                <p class="text-neutral-400"><strong>User:</strong> {{ $booking->user->name }}</p>
                                <p class="text-neutral-400"><strong>Number of Tickets:</strong>
                                    {{ $booking->num_tickets }}
                                </p>
                                <p class="text-neutral-400"><strong>Seats:</strong>
                                    @foreach (json_decode($booking->seats) as $seat)
                                        Seat number {{ $seat }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </p>
                                <p class="text-neutral-400"><strong>Booking Date:</strong> {{ $booking->booking_date }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
