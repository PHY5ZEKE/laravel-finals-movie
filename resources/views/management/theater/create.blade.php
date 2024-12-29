<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl md:text-3xl mb-5 text-red-600">Add Theater</h1>
                    <hr />
                    <br />
                    <form action="{{ route('management.theater.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="name"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Theater
                                        Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="given-name"
                                            class=" block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="name" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="location"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Location</label>
                                    <div class="mt-2">
                                        <input type="text" name="location" id="location" autocomplete="family-name"
                                            class=" block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="location" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="capacity"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Capacity</label>
                                    <div class="mt-2">
                                        <input type="number" name="capacity" id="capacity" autocomplete="given-name"
                                            class=" block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="capacity" />
                                </div>

                                <div class="col-span-full">
                                    <label for="image-file"
                                        class="block text-sm font-medium leading-6 text-neutral-400"> Theater Image
                                        </label>
                                    <div class="mt-2">
                                        <input type="file" name="imagePath" id="imagePath"
                                            class="px-2 block w-full rounded-md py-1.5 text-neutral-400 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6">
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
