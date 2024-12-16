<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="btn btn-primary mb-4"> <a href="{{ route('management.theater.create') }}"
                            class="inline-block bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700 py-2 px-4 mb-4">
                            Add Theater
                        </a></button>

                    <div class="space-y-4">
                        @foreach ($theaters as $theater)
                            <a href="{{ route('management.theater.show', $theater->theater_id) }}"
                                class="block px-4 py-6 border-2 border-neutral-700 rounded-lg shadow-sm">

                                <h2 class="text-xl font-bold text-red-500">{{ $theater->name }}</h2>
                                <p class="text-neutral-400"><strong>Location:</strong> {{ $theater->location }}</p>
                                <p class="text-neutral-400"><strong>Capacity:</strong> {{ $theater->capacity }} chairs
                                </p>

                            </a>
                        @endforeach
                    </div>
                    {{ $theaters->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
