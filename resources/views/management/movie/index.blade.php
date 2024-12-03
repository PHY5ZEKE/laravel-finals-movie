<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="btn btn-primary mb-4"> <a href="{{ route('management.movie.create') }}"
                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
                            Add Movie
                        </a></button>

                    <form id="search-form" class="space-y-4" action="{{ route('management.movie.index') }}" method="GET">
                        <input type="text" name="search" id="search"
                            class="w-full border border-gray-200 rounded-lg shadow-sm" placeholder="Search for a movie"
                            value="">
                        @foreach ($movies as $movie)
                            <a href="{{ route('management.movie.show', $movie->movie_id) }}"
                                class="block px-4 py-6 border border-gray-200 rounded-lg shadow-sm">
                                @if ($movie->posterPath)
                                    <img src="{{ asset($movie->posterPath) }}" alt="Movie Poster"
                                        class="mb-4 w-32 h-48 object-cover">
                                @endif
                                <h2 class="text-xl font-bold text-blue-500">{{ $movie->title }}</h2>
                                <p class="text-gray-700"><strong>Genre:</strong> {{ $movie->genre }}</p>
                                <p class="text-gray-700"><strong>Duration:</strong> {{ $movie->duration }} minutes</p>
                                <p class="text-gray-700"><strong>Release Date:</strong> {{ $movie->releaseDate }}</p>
                                <p class="text-gray-700"><strong>Description:</strong> {{ $movie->description }}</p>

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
