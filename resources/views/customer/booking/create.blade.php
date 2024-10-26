<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-blue-500 mb-4">Book Showtime</h2>
                
                <!-- Showtime Details -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-900">Showtime Details</h3>
                    <p class="text-gray-700"><strong>Movie Title:</strong> {{ $showtime->movie->title }}</p>
                    <p class="text-gray-700"><strong>Theater Name:</strong> {{ $showtime->theater->theater_name }}</p>
                    <p class="text-gray-700"><strong>Theater Location:</strong> {{ $showtime->theater->location }}</p>
                    <p class="text-gray-700"><strong>Show Date:</strong> {{ $showtime->show_date }}</p>
                    <p class="text-gray-700"><strong>Show Time:</strong> {{ $showtime->show_time }}</p>
                </div>

                <!-- Display All Errors -->
                @if ($errors->any())
                    <div class="mb-4">
                        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('customer.booking.store') }}" method="POST">
                    @csrf

                    <!-- Hidden input for showtime_id -->
                    <input type="hidden" name="showtime_id" value="{{ $showtime->showtime_id }}">

                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Booking Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Fill out the details below to book the showtime</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="num_tickets" class="block text-sm font-medium leading-6 text-gray-900">Number of Tickets</label>
                                <div class="mt-2">
                                    <input type="number" name="num_tickets" id="num_tickets" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                <x-form-error name="num_tickets" />
                            </div>

                            <div class="sm:col-span-6">
                                <label for="seats" class="block text-sm font-medium leading-6 text-gray-900">Select Seats</label>
                                <div class="mt-2 grid grid-cols-5 gap-2">
                                    @foreach($seats as $seat)
                                        <div class="seat-box {{ $seat->seat_status == 'available' ? 'available' : 'booked' }}" data-seat-id="{{ $seat->seat_id }}">
                                            {{ $seat->seat_number }}
                                        </div>
                                    @endforeach
                                </div>
                                <input type="text" name="seats[]" id="seats" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-form-error name="seats" />
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('customer.showtime.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .seat-box {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .seat-box.available {
            background-color: #4caf50;
            color: white;
        }
        .seat-box.booked {
            background-color: #9e9e9e;
            color: white;
            cursor: not-allowed;
        }
        .seat-box.selected {
            background-color: #ff9800;
            color: white;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const seatBoxes = document.querySelectorAll('.seat-box');
            const seatInput = document.getElementById('seats');
            const numTicketsInput = document.getElementById('num_tickets');

            seatBoxes.forEach(box => {
                if (box.classList.contains('available')) {
                    box.addEventListener('click', function () {
                        const seatId = box.getAttribute('data-seat-id');
                        if (box.classList.contains('selected')) {
                            box.classList.remove('selected');
                            console.log(`Deselected seat: ${seatId}`);
                        } else {
                            const selectedSeats = document.querySelectorAll('.seat-box.selected');
                            if (selectedSeats.length < numTicketsInput.value) {
                                box.classList.add('selected');
                                console.log(`Selected seat: ${seatId}`);
                            } else {
                                alert('You have selected the maximum number of seats.');
                            }
                        }
                        updateSeatInput();
                    });
                }
            });

            function updateSeatInput() {
                const selectedSeats = document.querySelectorAll('.seat-box.selected');
                const seatIds = Array.from(selectedSeats).map(box => box.getAttribute('data-seat-id'));
                seatInput.value = seatIds.join(',');
                console.log(`Current selected seats: ${seatInput.value}`);
            }
        });
    </script>
</x-app-layout>