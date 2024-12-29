<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="p-6 text-red-600">
                    <h1 class="text-xl md:text-3xl mb-5">Edit Movie</h1>
                    <hr class="border-red-600 mb-4" />
                    <form action="{{ route('management.movie.update', $movie->movie_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="title" class="block text-sm font-medium leading-6 text-neutral-400">Movie Title</label>
                                    <div class="mt-2">
                                        <input type="text" name="title" id="title" value="{{ $movie->title }}"
                                            class="block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="title" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="genre" class="block text-sm font-medium leading-6 text-neutral-400">Genre</label>
                                    <div class="mt-2">
                                        <input type="text" name="genre" id="genre" value="{{ $movie->genre }}"
                                            class="block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="genre" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="duration" class="block text-sm font-medium leading-6 text-neutral-400">Duration (minutes)</label>
                                    <div class="mt-2">
                                        <input type="number" name="duration" id="duration" value="{{ $movie->duration }}"
                                            class="block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="duration" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="releaseDate" class="block text-sm font-medium leading-6 text-neutral-400">Release Date</label>
                                    <div class="mt-2">
                                        <input type="date" name="releaseDate" id="releaseDate" value="{{ $movie->releaseDate }}"
                                            class="block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="releaseDate" />
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="description" class="block text-sm font-medium leading-6 text-neutral-400">Description</label>
                                    <div class="mt-2">
                                        <textarea name="description" id="description" rows="4"
                                            class="block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">{{ $movie->description }}</textarea>
                                    </div>
                                    <x-form-error name="description" />
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="posterPath" class="block text-sm font-medium leading-6 text-neutral-400">Poster</label>
                                    <div class="mt-2 flex items-center">
                                        @if ($movie->posterPath)
                                            <img src="{{ asset($movie->posterPath) }}" alt="{{ $movie->title }}" class="w-32 h-40 object-cover rounded-lg shadow-md mr-4">
                                        @else
                                            <div class="w-32 h-40 bg-white flex items-center justify-center text-center text-neutral-400 rounded-lg shadow-md mr-4">
                                                No Image Available
                                            </div>
                                        @endif
                                        <input type="file" name="posterPath" id="posterPath"
                                            class="block w-full text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="posterPath" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('management.movie.index') }}">
                                <button type="button"
                                    class="mt-5 px-5 py-2 bg-neutral-600 text-neutral-300 rounded-lg font-semibold hover:bg-neutral-700">Cancel</button>
                            </a>

                            <button type="submit"
                                class="mt-5 px-5 py-2 bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>