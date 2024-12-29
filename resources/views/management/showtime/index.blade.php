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

                    <form id="search-form" class="space-y-4" action="{{ route('management.showtime.index') }}" method="GET">
                        <input type="text" name="search" id="search"
                            class="w-full border-2 border-neutral-700 focus:border-red-600 focus:ring-red-500 rounded-lg shadow-sm"
                            placeholder="Search for showtimes" value="">
                    </form>

                </br>

                    <div class="space-y-4">
                        @foreach ($showtimes as $showtime)
                            <a href="{{ route('management.showtime.show', $showtime->showtime_id) }}"
                                class="block px-4 py-6 border-2 border-neutral-700 rounded-lg shadow-sm">
                                <div class="flex flex-col md:flex-row gap-4">
                                    @if ($showtime->movie->posterPath)
                                        <div class="relative w-64 h-72  flex items-center justify-center">
                                            <img src="{{ asset($showtime->movie->posterPath) }}" alt="{{ $showtime->movie->title}}" class="absolute inset-0 w-full h-full object-cover rounded-lg shadow-md">
                                        </div>
                                    @else
                                        <div class="w-64 h-72 bg-white flex items-center justify-center text-center text-neutral-400 rounded-lg shadow-md">
                                            No Image Available
                                        </div>
                                    @endif
                                    <div class="flex flex-col justify-center space-y-2">
                                        <h2 class="text-xl font-bold text-red-500">{{ $showtime->movie->title }}</h2>
                                        <p class="text-neutral-400"><strong>Theater:</strong> {{ $showtime->theater->name }}</p>
                                        <p class="text-neutral-400"><strong>Location:</strong> {{ $showtime->theater->location }}</p>
                                        <p class="text-neutral-400"><strong>Show Date:</strong> {{ $showtime->show_date }}</p>
                                        <p class="text-neutral-400"><strong>Show Time:</strong> {{ $showtime->show_time }}</p>
                                        <p class="text-neutral-400"><strong>Available Seats:</strong> {{ $showtime->available_seats }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{ $showtimes->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>