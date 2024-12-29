<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="btn btn-primary mb-4">
                        <a href="{{ route('management.theater.create') }}"
                            class="inline-block bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700 py-2 px-4 mb-4">
                            Add Theater
                        </a>
                    </button>

                    <form id="search-form" class="space-y-4" action="{{ route('management.theater.index') }}" method="GET">
                        <input type="text" name="search" id="search"
                            class="w-full border-2 border-neutral-700 focus:border-red-600 focus:ring-red-500 rounded-lg shadow-sm"
                            placeholder="Search for a theater" value="">
                    </form>

                </br>

                    <div class="space-y-4">
                        @foreach ($theaters as $theater)
                            <a href="{{ route('management.theater.show', $theater->theater_id) }}"
                                class="block px-4 py-6 border-2 border-neutral-700 rounded-lg shadow-sm">
                                <div class="flex flex-col md:flex-row gap-4">
                                    @if ($theater->imagePath)
                                        <div class="relative w-64 h-72  flex items-center justify-center">
                                            <img src="{{ asset($theater->imagePath) }}" alt="{{ $theater->name }}" class="absolute inset-0 w-full h-full object-cover rounded-lg shadow-md">
                                        </div>
                                    @else
                                        <div class="w-64 h-72 bg-white flex items-center justify-center text-center text-neutral-400 rounded-lg shadow-md">
                                            No Image Available
                                        </div>
                                    @endif
                                    <div class="flex flex-col justify-center space-y-2">
                                        <h2 class="text-xl font-bold text-red-500">{{ $theater->name }}</h2>
                                        <p class="text-neutral-400"><strong>Location:</strong> {{ $theater->location }}</p>
                                        <p class="text-neutral-400"><strong>Capacity:</strong> {{ $theater->capacity }} chairs</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{ $theaters->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>