<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="bg-neutral-900">
        <img src="{{ asset('movie.jpg') }}" alt="Cinema"
            class="absolute inset-0 h-screen w-full object-cover opacity-85 grayscale" />
        <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-80"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-red-600 opacity-20"></div>

        <div class="relative min-h-screen">

            <header class="p-3">
                @if (Route::has('login'))
                    <nav class="flex flex-1 gap-3 justify-between items-center">
                        <a href="{{ url('/dashboard') }}"
                            class="font-bold rounded-md py-2 text-neutral-300 ring-1 ring-transparent transition hover:text-red-600  focus:outline-none">
                            CineServe
                        </a>


                        <div class="flex flex-1 gap-5 justify-end">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="font-semibold rounded-md py-2 text-neutral-300 ring-1 ring-transparent transition hover:text-red-600  focus:outline-none">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="font-semibold rounded-md  py-2 text-neutral-300 ring-1 ring-transparent transition hover:text-red-600 focus:outline-none">
                                    Log In
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="font-semibold rounded-md py-2 text-neutral-300 ring-1 ring-transparent transition hover:text-red-600 focus:outline-none">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>

                    </nav>
                @endif
            </header>

            <div class="container mt-20">
                <div class="flex flex-1 flex-col items-center justify-center h-96 my-auto w-auto mx-auto">
                    <a href="/">
                        <p
                            class="text-6xl md:text-9xl transition-all font-bold bg-gradient-to-t from-red-800 via-red-700 to-red-600 bg-clip-text text-transparent">
                            CineServe
                        </p>
                    </a>
                    <p class="text-xl md:text-3xl font-semibold text-neutral-300">Make cinema great again!</p>

                    <a href="{{ route('register') }}">
                        <button
                            class="mt-5 px-5 py-2 bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700">
                            Get Started
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
