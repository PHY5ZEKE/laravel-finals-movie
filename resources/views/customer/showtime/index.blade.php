<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl md:text-3xl mb-5 font-bold text-red-600">Book A Movie</h1>
                    <div class="space-y-4">
                        @foreach ($showtimes as $showtime)
                            <a href="{{ route('customer.showtime.show', $showtime->showtime_id) }}"
                                class="block px-4 py-6 border-2 border-neutral-700 rounded-lg shadow-sm">

                                <div class="flex flex-col md:flex-row gap-4">
                                    @if ($showtime->movie->posterPath)
                                        <div class="w-64 h-72 object-cover">
                                            <img src="{{ asset($showtime->movie->posterPath) }}"
                                                alt="{{ $showtime->movie->title }}"
                                                class="w-64 h-72 object-cover bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-64 h-72 bg-white flex items-center justify-center text-center text-neutral-400">
                                            No Image Available
                                        </div>
                                    @endif

                                    <div>
                                        <h2 class="text-xl font-bold text-red-600">{{ $showtime->movie->title }}</h2>
                                        <p class="text-neutral-400"><strong>Genre:</strong>
                                            {{ $showtime->movie->genre }}</p>
                                        <p class="text-neutral-400"><strong>Theater:</strong>
                                            {{ $showtime->theater->name }}</p>
                                        <p class="text-neutral-400"><strong>Show Date:</strong>
                                            {{ $showtime->show_date }}</p>
                                        <p class="text-neutral-400"><strong>Show Time:</strong>
                                            {{ $showtime->show_time }}</p>
                                    </div>
                                </div>


                            </a>
                        @endforeach
                    </div>
                    {{ $showtimes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
