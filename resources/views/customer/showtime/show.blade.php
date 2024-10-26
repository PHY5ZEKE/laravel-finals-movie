<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-blue-500 mb-4">Showtime Details</h2>
                <div class="space-y-2 mb-4">
                    <h3 class="font-bold text-xl text-gray-900">Movie Details</h3>
                    <p class="text-gray-700"><strong>Title:</strong> {{ $showtime->movie->title }}</p>
                    <p class="text-gray-700"><strong>Genre:</strong> {{ $showtime->movie->genre }}</p>
                    <p class="text-gray-700"><strong>Duration:</strong> {{ $showtime->movie->duration }} minutes</p>
                    <p class="text-gray-700"><strong>Release Date:</strong> {{ $showtime->movie->releaseDate }}</p>
                    <p class="text-gray-700"><strong>Description:</strong> {{ $showtime->movie->description }}</p>
                </div>
                <div class="space-y-2 mb-4">
                    <h3 class="font-bold text-xl text-gray-900">Theater Details</h3>
                    <p class="text-gray-700"><strong>Name:</strong> {{ $showtime->theater->name }}</p>
                    <p class="text-gray-700"><strong>Location:</strong> {{ $showtime->theater->location }}</p>
                    <p class="text-gray-700"><strong>Capacity:</strong> {{ $showtime->theater->capacity }}</p>
                </div>
                <div class="space-y-2 mb-4">
                    <h3 class="font-bold text-xl text-gray-900">Showtime Details</h3>
                    <p class="text-gray-700"><strong>Show Date:</strong> {{ $showtime->show_date }}</p>
                    <p class="text-gray-700"><strong>Show Time:</strong> {{ $showtime->show_time }}</p>
                    <p class="text-gray-700"><strong>Available Seats:</strong> {{ $showtime->available_seats }}</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('customer.booking.create', ['showtime' => $showtime->showtime_id]) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Book
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>