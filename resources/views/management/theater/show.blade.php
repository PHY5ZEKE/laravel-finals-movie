<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-red-500 mb-4">{{ $theater->name }}</h2>
                <div class="space-y-2 mb-4">
                    <p class="text-neutral-400"><strong>Location:</strong> {{ $theater->location }}</p>
                    <p class="text-neutral-400"><strong>Capacity:</strong> {{ $theater->capacity }} seats</p>

                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('management.theater.edit', $theater->theater_id) }}"
                        class="px-5 py-2 bg-neutral-600 text-neutral-300 rounded-lg font-semibold hover:bg-neutral-700">
                        Edit
                    </a>
                    <form action="{{ route('management.theater.destroy', $theater->theater_id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this movie?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-5 py-2 bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
