<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-red-600 mb-4">Showtime Details</h2>
                <hr />
                <div class="mt-3 space-y-2 mb-4">
                    <h3 class="font-bold text-xl text-red-600">Movie Details</h3>
                    <p class="text-neutral-400"><strong>Title:</strong> {{ $showtime->movie->title }}</p>
                    <p class="text-neutral-400"><strong>Genre:</strong> {{ $showtime->movie->genre }}</p>
                    <p class="text-neutral-400"><strong>Duration:</strong> {{ $showtime->movie->duration }} minutes</p>
                    <p class="text-neutral-400"><strong>Release Date:</strong> {{ $showtime->movie->releaseDate }}</p>
                    <p class="text-neutral-400"><strong>Description:</strong> {{ $showtime->movie->description }}</p>
                </div>
                <div class="space-y-2 mb-4">
                    <h3 class="font-bold text-xl text-red-600">Theater Details</h3>
                    <p class="text-neutral-400"><strong>Name:</strong> {{ $showtime->theater->name }}</p>
                    <p class="text-neutral-400"><strong>Location:</strong> {{ $showtime->theater->location }}</p>
                    <p class="text-neutral-400"><strong>Capacity:</strong> {{ $showtime->theater->capacity }}</p>
                </div>
                <div class="space-y-2 mb-4">
                    <h3 class="font-bold text-xl text-red-600">Showtime Details</h3>
                    <p class="text-neutral-400"><strong>Show Date:</strong> {{ $showtime->show_date }}</p>
                    <p class="text-neutral-400"><strong>Show Time:</strong> {{ $showtime->show_time }}</p>
                    <p class="text-neutral-400"><strong>Available Seats:</strong> {{ $showtime->available_seats }}</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('customer.booking.create', ['showtime' => $showtime->showtime_id]) }}"
                        class="px-5 py-2 bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700">
                        Book
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
