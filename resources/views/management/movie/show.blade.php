<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-blue-500 mb-4">{{ $movie->title }}</h2>
                <div class="space-y-2 mb-4">
                    <p class="text-gray-700"><strong>Genre:</strong> {{ $movie->genre }}</p>
                    <p class="text-gray-700"><strong>Duration:</strong> {{ $movie->duration }} minutes</p>
                    <p class="text-gray-700"><strong>Release Date:</strong> {{ $movie->releaseDate }}</p>
                    <p class="text-gray-700"><strong>Description:</strong> {{ $movie->description }}</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('management.movie.edit', $movie->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Edit
                    </a>
                    <form action="{{ route('management.movie.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>