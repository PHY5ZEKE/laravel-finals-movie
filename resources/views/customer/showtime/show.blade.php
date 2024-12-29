<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-red-600 mb-4">Showtime Details</h2>
                <hr class="border-red-600 mb-4" />
                
                <!-- Movie Details Section -->
                <div class="mb-8">
                   
                    <div class="flex space-x-4">
                        @if ($showtime->movie->posterPath)
                            <div class="relative w-64 h-72  flex items-center justify-center">
                                <img src="{{ asset($showtime->movie->posterPath) }}" alt="{{ $showtime->movie->title }}" class="absolute inset-0 w-full h-full object-cover rounded-lg shadow-md">
                            </div>
                        @else
                            <div class="w-64 h-72 bg-white flex items-center justify-center text-center text-neutral-400 rounded-lg shadow-md">
                                No Image Available
                            </div>
                        @endif
                        <div class="flex flex-col justify-center space-y-2">
                            <h3 class="font-bold text-xl text-red-600">Movie Details</h3>
                            <p class="text-neutral-400"><strong>Title:</strong> {{ $showtime->movie->title }}</p>
                            <p class="text-neutral-400"><strong>Genre:</strong> {{ $showtime->movie->genre }}</p>
                            <p class="text-neutral-400"><strong>Duration:</strong> {{ $showtime->movie->duration }} minutes</p>
                            <p class="text-neutral-400"><strong>Release Date:</strong> {{ $showtime->movie->releaseDate }}</p>
                            <p class="text-neutral-400"><strong>Description:</strong> {{ $showtime->movie->description }}</p>
                        </div>
                    </div>
                </div>
                
                <hr class="border-red-600 mb-4" />
                
                <!-- Theater Details Section -->
                <div class="mb-8">
                  
                    <div class="flex space-x-4">
                        @if ($showtime->theater->imagePath)
                            <div class="relative w-64 h-72 flex items-center justify-center">
                                <img src="{{ asset($showtime->theater->imagePath) }}" alt="{{ $showtime->theater->name }}" class="absolute inset-0 w-full h-full object-cover rounded-lg shadow-md">
                            </div>
                        @else
                            <div class="w-64 h-72 bg-white flex items-center justify-center text-center text-neutral-400 rounded-lg shadow-md">
                                No Image Available
                            </div>
                        @endif
                        <div class="flex flex-col justify-center space-y-2">
                            <h3 class="font-bold text-xl text-red-600">Theater Details</h3>
                            <p class="text-neutral-400"><strong>Name:</strong> {{ $showtime->theater->name }}</p>
                            <p class="text-neutral-400"><strong>Location:</strong> {{ $showtime->theater->location }}</p>
                            <p class="text-neutral-400"><strong>Capacity:</strong> {{ $showtime->theater->capacity }}</p>
                        </div>
                    </div>
                </div>
                
                <hr class="border-red-600 mb-4" />
                
                <!-- Showtime Details Section -->
                <div class="space-y-2 mb-8">
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