<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl md:text-3xl mb-5 text-red-600">Edit Theater</h1>
                    <hr class="border-red-600 mb-4" />
                    <form action="{{ route('management.theater.update', $theater->theater_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium leading-6 text-neutral-400">Theater Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" value="{{ $theater->name }}"
                                            class="block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="name" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="location" class="block text-sm font-medium leading-6 text-neutral-400">Location</label>
                                    <div class="mt-2">
                                        <input type="text" name="location" id="location" value="{{ $theater->location }}"
                                            class="block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="location" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="capacity" class="block text-sm font-medium leading-6 text-neutral-400">Seat Capacity</label>
                                    <div class="mt-2">
                                        <input type="number" name="capacity" id="capacity" value="{{ $theater->capacity }}"
                                            class="block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="capacity" />
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="imagePath" class="block text-sm font-medium leading-6 text-neutral-400">Image</label>
                                    <div class="mt-2 flex items-center">
                                        @if ($theater->imagePath)
                                            <img src="{{ asset($theater->imagePath) }}" alt="{{ $theater->name }}" class="w-32 h-40 object-cover rounded-lg shadow-md mr-4">
                                        @else
                                            <div class="w-32 h-40 bg-white flex items-center justify-center text-center text-neutral-400 rounded-lg shadow-md mr-4">
                                                No Image Available
                                            </div>
                                        @endif
                                        <input type="file" name="imagePath" id="imagePath"
                                            class="block w-full text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="imagePath" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('management.theater.index') }}">
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