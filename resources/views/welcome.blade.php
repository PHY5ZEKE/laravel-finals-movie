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

        <div class="relative min-h-screen">

            <header class="p-3">
                @if (Route::has('login'))
                    <nav class="flex flex-1 gap-3 justify-between items-center">
                        <p
                            class="text-3xl font-bold bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-red-900 via-red-700 to-red-600 bg-clip-text text-transparent">
                            Stream
                        </p>

                        <div class="flex flex-1 gap-5 justify-end">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md py-2 text-white ring-1 ring-transparent transition hover:text-neutral-300  focus:outline-none">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md  py-2 text-white ring-1 ring-transparent transition hover:text-neutral-300 focus:outline-none">
                                    Log In
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md py-2 text-white ring-1 ring-transparent transition hover:text-neutral-300 focus:outline-none">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>

                    </nav>
                @endif
            </header>

            <div>

            </div>
        </div>
    </div>
</body>

</html>
