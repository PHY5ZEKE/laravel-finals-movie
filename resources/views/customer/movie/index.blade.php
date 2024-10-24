<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    
                    <div class="space-y-4">
                        @foreach ($showtimes as $showtime)
                            {{-- <a href="{{ route('management.showtime.show', $showtime->showtime_id) }}" class="block px-4 py-6 border border-gray-200 rounded-lg shadow-sm"> --}}
                                <h2 class="text-xl font-bold text-blue-500">{{ $showtime->movie->title }}</h2>
                                <p class="text-gray-700"><strong>Genre:</strong> {{ $showtime->movie->genre }}</p>
                                <p class="text-gray-700"><strong>Duration:</strong> {{ $showtime->movie->duration }} minutes</p>
                                <p class="text-gray-700"><strong>Release Date:</strong> {{ $showtime->movie->releaseDate }}</p>
                                <p class="text-gray-700"><strong>Description:</strong> {{ $showtime->movie->description }}</p>
                                <p class="text-gray-700"><strong>Theater:</strong> {{ $showtime->theater->name }}</p>
                                <p class="text-gray-700"><strong>Location:</strong> {{ $showtime->theater->location }}</p>
                                <p class="text-gray-700"><strong>Show Date:</strong> {{ $showtime->show_date }}</p>
                                <p class="text-gray-700"><strong>Show Time:</strong> {{ $showtime->show_time }}</p>
                                <p class="text-gray-700"><strong>Available Seats:</strong> {{ $showtime->available_seats }}</p>
                            {{-- </a> --}}
                        @endforeach
                    </div>
                    {{ $showtimes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>