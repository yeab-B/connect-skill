<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Connect & Grow') }}</title>
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
       
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 py-3 flex items-center space-x-4">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="40">
                    <span class="text-xl font-semibold text-gray-800">Connect & Grow</span>
                </a>
            </div>
        </div>

        
        @include('layouts.navigation')

       
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
