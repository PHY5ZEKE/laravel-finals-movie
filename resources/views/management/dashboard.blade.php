<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <h1 class="text-2xl text-red-600 mb-4">Welcome to your dashboard!</h1>
            </div>

            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg my-3">
                <div class="p-6 container grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xl text-neutral-400">Theater Statistics</p>
                        <p class="text-neutral-600">Total Number of Theaters: <span
                                class="text-red-700">{{ $theaters->total() }}</span></p>
                    </div>

                    <div>
                        <p class="text-xl text-neutral-400">User Statistics</p>
                        <p class="text-neutral-600">Total Number of Users: <span
                                class="text-red-700">{{ $users->total() }}</span></p>
                    </div>
                </div>
            </div>

            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <p class="text-xl text-neutral-400">Movie Statistics</p>
                    <p class="text-neutral-600">Total Number of Movies Currently Showing: <span
                            class="text-red-700">{{ $movies->count() }}</span></p>
                    <p class="text-neutral-600">Total Bookings: <span class="text-red-700">
                            {{ $bookings->count() }}</span> </p>
                </div>

                <div class="p-6 container grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xl text-neutral-400">Popular Movies</p>
                        <div>
                            <canvas id="popularMoviesChart"></canvas>
                        </div>
                    </div>


                    <div>
                        <p class="text-xl text-neutral-400">Popular Genres</p>
                        <div>
                            <canvas id="popularGenresChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctxMovies = document.getElementById('popularMoviesChart').getContext('2d');
            var popularMoviesChart = new Chart(ctxMovies, {
                type: 'pie',
                data: {
                    labels: @json($popularMovies->pluck('movie.title')),
                    datasets: [{
                        label: 'Number of Bookings',
                        data: @json($popularMovies->pluck('count')),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });

            var ctxGenres = document.getElementById('popularGenresChart').getContext('2d');
            var popularGenresChart = new Chart(ctxGenres, {
                type: 'bar',
                data: {
                    labels: @json($popularMovies->pluck('movie.genre')),
                    datasets: [{
                        label: 'Number of Bookings',
                        data: @json($popularMovies->pluck('count')),
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
