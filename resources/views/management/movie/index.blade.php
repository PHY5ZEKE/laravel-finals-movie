<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="btn btn-primary mb-4"> <a href="{{ route('management.movie.create') }}"
                            class="inline-block bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700 py-2 px-4 mb-4">
                            Add Movie
                        </a></button>

                    <form id="search-form" class="space-y-4" action="{{ route('management.movie.index') }}" method="GET">
                        <input type="text" name="search" id="search"
                            class="w-full border-2 border-neutral-700  focus:border-red-600 focus:ring-red-500 rounded-lg shadow-sm"
                            placeholder="Search for a movie" value="">
                        @foreach ($movies as $movie)
                            <a href="{{ route('management.movie.show', $movie->movie_id) }}"
                                class="block px-4 py-6 border-2 border-neutral-700 rounded-lg shadow-sm">
                                <div class="flex flex-col md:flex-row gap-4">
                                    @if ($movie->posterPath)
                                        <div class="w-64 h-72 object-cover">
                                            <img src="{{ asset($movie->posterPath) }}" alt="{{ $movie->title }}"
                                                class="w-64 h-72 object-cover bg-white">
                                        </div>
                                    @else
                                        <div
                                            class="w-64 h-72 bg-white flex items-center justify-center text-center text-neutral-400">
                                            No Image Available
                                        </div>
                                    @endif
                                    <div>
                                        <h2 class="text-xl font-bold text-red-500">{{ $movie->title }}</h2>
                                        <p class="text-neutral-400"><strong>Genre:</strong> {{ $movie->genre }}</p>
                                        <p class="text-neutral-400"><strong>Duration:</strong> {{ $movie->duration }}
                                            minutes
                                        </p>
                                        <p class="text-neutral-400"><strong>Release Date:</strong>
                                            {{ $movie->releaseDate }}
                                        </p>
                                        <p class="text-neutral-400"><strong>Description:</strong>
                                            {{ $movie->description }}
                                        </p>

                                    </div>
                                </div>
                            </a>
                        @endforeach
                        <div>

                        </div>
                    </form>
                    {{ $movies->links('vendor.pagination.tailwind') }}

                </div>
            </div>
        </div>

    </div>

</x-app-layout>
