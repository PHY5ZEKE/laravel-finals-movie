<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="btn btn-primary mb-4">
                        <a href="{{ route('management.showtime.create') }}"
                            class="inline-block bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700 py-2 px-4 mb-4">
                            Add Showtime
                        </a>
                    </button>

                    <div class="space-y-4">
                        @foreach ($showtimes as $showtime)
                            <a href="{{ route('management.showtime.show', $showtime->showtime_id) }}"
                                class="block px-4 py-6 border-2 border-neutral-700 rounded-lg shadow-sm">
                                <h2 class="text-xl font-bold text-red-500">{{ $showtime->movie->title }}</h2>
                                <p class="text-neutral-400"><strong>Genre:</strong> {{ $showtime->movie->genre }}</p>
                                <p class="text-neutral-400"><strong>Duration:</strong> {{ $showtime->movie->duration }}
                                    minutes</p>
                                <p class="text-neutral-400"><strong>Release Date:</strong>
                                    {{ $showtime->movie->releaseDate }}</p>
                                <p class="text-neutral-400"><strong>Description:</strong>
                                    {{ $showtime->movie->description }}</p>
                                <p class="text-neutral-400"><strong>Theater:</strong> {{ $showtime->theater->name }}</p>
                                <p class="text-neutral-400"><strong>Location:</strong>
                                    {{ $showtime->theater->location }}</p>
                                <p class="text-neutral-400"><strong>Show Date:</strong> {{ $showtime->show_date }}</p>
                                <p class="text-neutral-400"><strong>Show Time:</strong> {{ $showtime->show_time }}</p>
                                <p class="text-neutral-400"><strong>Available Seats:</strong>
                                    {{ $showtime->available_seats }}</p>
                            </a>
                        @endforeach
                    </div>
                    {{ $showtimes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
