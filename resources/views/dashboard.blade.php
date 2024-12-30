<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <h1 class="text-2xl text-red-600 mb-4">Now Showing</h1>
            </div>

            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg my-3">
                <div class="p-6">
                    <div class="container flex flex-wrap justify-center gap-6">
                        @foreach ($movies as $index => $showtime)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ $showtime->movie->posterPath }}" alt="{{ $showtime->movie->title }}"
                                    class="w-100 h-80 object-cover">
                                <div class="carousel-caption d-none d-md-block mt-3">
                                    <p class="font-bold text-2xl text-red-700 mb-0">{{ $showtime->movie->title }}
                                    </p>
                                    <p class="text-neutral-400">{{ $showtime->movie->genre }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
