<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-blue-500 mb-4">Edit Showtime</h2>
                <form action="{{ route('management.showtime.update', $showtime->showtime_id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Showtime Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Edit the details below to update the showtime</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="movie_id" class="block text-sm font-medium leading-6 text-gray-900">Movie</label>
                                <div class="mt-2">
                                    <select name="movie_id" id="movie_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @foreach($movies as $movie)
                                            <option value="{{ $movie->movie_id }}" {{ $showtime->movie_id == $movie->movie_id ? 'selected' : '' }}>{{ $movie->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-form-error name="movie_id" />
                            </div>

                            <div class="sm:col-span-3">
                                <label for="theater_id" class="block text-sm font-medium leading-6 text-gray-900">Theater</label>
                                <div class="mt-2">
                                    <select name="theater_id" id="theater_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" onchange="updateAvailableSeats()">
                                        @foreach($theaters as $theater)
                                            <option value="{{ $theater->theater_id }}" data-capacity="{{ $theater->capacity }}" {{ $showtime->theater_id == $theater->theater_id ? 'selected' : '' }}>{{ $theater->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-form-error name="theater_id" />
                            </div>

                            <div class="sm:col-span-3">
                                <label for="show_date" class="block text-sm font-medium leading-6 text-gray-900">Show Date</label>
                                <div class="mt-2">
                                    <input type="date" name="show_date" id="show_date" value="{{ $showtime->show_date }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                <x-form-error name="show_date" />
                            </div>

                            <div class="sm:col-span-3">
                                <label for="show_time" class="block text-sm font-medium leading-6 text-gray-900">Show Time</label>
                                <div class="mt-2">
                                    <input type="time" name="show_time" id="show_time" value="{{ $showtime->show_time }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                <x-form-error name="show_time" />
                            </div>

                            <div class="sm:col-span-3">
                                <label for="available_seats" class="block text-sm font-medium leading-6 text-gray-900">Available Seats</label>
                                <div class="mt-2">
                                    <input type="number" name="available_seats" id="available_seats" value="{{ $showtime->available_seats }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly>
                                </div>
                                <x-form-error name="available_seats" />
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('management.showtime.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
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