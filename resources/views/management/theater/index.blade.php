<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <button class="btn btn-primary mb-4"> <a href="{{ route('management.theater.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
                    Add Theater
                </a></button>
                    
                    <div class="space-y-4">
                        @foreach ($theaters as $theater)
                        <a href="{{ route('management.theater.show', $theater->theater_id) }}" class="block px-4 py-6 border border-gray-200 rounded-lg shadow-sm">
                                <h2 class="text-xl font-bold text-blue-500">{{ $theater->name }}</h2>
                                <p class="text-gray-700"><strong>Location:</strong> {{ $theater->location }}</p>
                                <p class="text-gray-700"><strong>Capacity:</strong> {{ $theater->capacity }} chairs</p>
                                
                            </a>
                        @endforeach
                    </div>
                    {{ $theaters->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>