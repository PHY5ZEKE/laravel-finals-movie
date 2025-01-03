<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex p-4 flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-neutral-900">
        <div>
            <a href="/">
                {{-- <p
                    class="text-6xl font-bold bg-gradient-to-t from-red-800 via-red-700 to-red-600 bg-clip-text text-transparent">
                    CineServe
                </p> --}}
                <img src="{{ asset('android-chrome-192x192.png') }}" alt="CineServe" />
            </a>

        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-neutral-800 overflow-hidden sm:rounded-lg border-2 border-neutral-700">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
