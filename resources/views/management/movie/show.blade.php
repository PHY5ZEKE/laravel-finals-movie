<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
              
                <div class="flex space-x-4 mb-4">
                    @if ($movie->posterPath)
                        <div class="relative w-64 h-72 flex items-center justify-center">
                            <img src="{{ asset($movie->posterPath) }}" alt="{{ $movie->title }}" class="absolute inset-0 w-full h-full object-cover rounded-lg shadow-md">
                        </div>
                    @else
                        <div class="w-64 h-72 bg-white flex items-center justify-center text-center text-neutral-400 rounded-lg shadow-md">
                            No Image Available
                        </div>
                    @endif
                    <div class="flex flex-col justify-center space-y-2">
                        <h2 class="font-bold text-2xl text-red-600 mb-4">{{ $movie->title }}</h2>
                        <p class="text-neutral-400"><strong>Genre:</strong> {{ $movie->genre }}</p>
                        <p class="text-neutral-400"><strong>Duration:</strong> {{ $movie->duration }} minutes</p>
                        <p class="text-neutral-400"><strong>Release Date:</strong> {{ $movie->releaseDate }}</p>
                        <p class="text-neutral-400"><strong>Description:</strong> {{ $movie->description }}</p>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('management.movie.edit', $movie->movie_id) }}" class="px-5 py-2 bg-neutral-600 text-neutral-300 rounded-lg font-semibold hover:bg-neutral-700">
                        Edit
                    </a>
                    <form action="{{ route('management.movie.destroy', $movie->movie_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-5 py-2 bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>