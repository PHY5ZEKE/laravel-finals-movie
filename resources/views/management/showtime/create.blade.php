<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-neutral-400">
                    <h1 class="text-xl md:text-3xl mb-5 text-red-600">Add Showtime</h1>
                    <hr />
                    <br />
                    <form action="{{ route('management.showtime.store') }}" method="POST">
                        @csrf

                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-neutral-400">Showtime Information</h2>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="movie_id"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Movie</label>
                                    <div class="mt-2">
                                        <select name="movie_id" id="movie_id"
                                            class="block w-full rounded-md border-0 py-1.5 text-neutral-700 shadow-sm  focus:border-red-600 focus:ring-red-500 sm:text-sm sm:leading-6">
                                            @foreach ($movies as $movie)
                                                <option value="{{ $movie->movie_id }}">{{ $movie->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-form-error name="movie_id" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="theater_id"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Theater</label>
                                    <div class="mt-2">
                                        <select name="theater_id" id="theater_id"
                                            class="block w-full rounded-md border-0 py-1.5 text-neutral-700 shadow-sm  focus:border-red-600 focus:ring-red-500 sm:text-sm sm:leading-6"
                                            onchange="updateAvailableSeats()">
                                            @foreach ($theaters as $theater)
                                                <option value="{{ $theater->theater_id }}"
                                                    data-capacity="{{ $theater->capacity }}">{{ $theater->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-form-error name="theater_id" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="show_date"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Show Date</label>
                                    <div class="mt-2">
                                        <input type="date" name="show_date" id="show_date"
                                            class="block w-full rounded-md border-0 py-1.5 text-neutral-700 shadow-sm  focus:border-red-600 focus:ring-red-500 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="show_date" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="show_time"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Show Time</label>
                                    <div class="mt-2">
                                        <input type="time" name="show_time" id="show_time"
                                            class="block w-full rounded-md border-0 py-1.5 text-neutral-700 shadow-sm focus:border-red-600 focus:ring-red-500 sm:text-sm sm:leading-6">
                                    </div>
                                    <x-form-error name="show_time" />
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="available_seats"
                                        class="block text-sm font-medium leading-6 text-neutral-400">Available
                                        Seats</label>
                                    <div class="mt-2">
                                        <input type="number" name="available_seats" id="available_seats"
                                            class=" block w-full rounded-md py-1.5 text-neutral-700 shadow-sm border border-gray-500 focus:border-red-600 focus:ring-red-500 placeholder:text-gray-400 sm:text-sm sm:leading-6"
                                            readonly>

                                    </div>
                                    <x-form-error name="available_seats" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('management.showtime.index') }}">
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

    <script>
        function updateAvailableSeats() {
            const theaterSelect = document.getElementById('theater_id');
            const selectedOption = theaterSelect.options[theaterSelect.selectedIndex];
            const capacity = selectedOption.getAttribute('data-capacity');
            document.getElementById('available_seats').value = capacity;
        }

        // Initialize available seats on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateAvailableSeats();
        });
    </script>
</x-app-layout>
