<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-xl md:text-3xl mb-5 text-red-600">Add Movie</h1>
                    <hr />
                    <br />
                    <form action="{{ route('management.movie.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="title"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Movie Title</label>
                                    <div class="mt-2">
                                        <input type="text" name="title" id="title" autocomplete="given-name"
                                            class=" block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="title" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="genre"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Genre</label>
                                    <div class="mt-2">
                                        <input type="text" name="genre" id="genre" autocomplete="family-name"
                                            class=" block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="genre" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="duration"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Duration (In
                                        Minutes)</label>
                                    <div class="mt-2">
                                        <input type="number" name="duration" id="duration" autocomplete="given-name"
                                            class=" block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="duration" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="releaseDate"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Release
                                        Date</label>
                                    <div class="mt-2">
                                        <input type="date" name="releaseDate" id="releaseDate"
                                            autocomplete="family-name"
                                            class=" block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="releaseDate" />
                                </div>

                                <div class="col-span-full">
                                    <label for="description"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Description</label>
                                    <div class="mt-2">
                                        <textarea name="description" id="description" rows="4"
                                            class=" block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6"></textarea>
                                    </div>
                                    <x-form-error name="description" />
                                </div>

                                <div class="col-span-full">
                                    <label for="image-file"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Movie
                                        Poster</label>
                                    <div class="mt-2">
                                        <input type="file" name="posterPath" id="posterPath"
                                            class="px-2 block w-full rounded-md py-1.5 text-neutral-400 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
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
