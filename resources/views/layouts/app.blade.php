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

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Link the custom CSS file -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <div class="flex h-screen overflow-hidden"> <!-- Use flex and overflow-hidden -->
        <!-- Sidebar -->
        <div class="sidebar bg-gray-800 text-white w-64 flex-shrink-0"> <!-- Fixed width sidebar -->
            <a href="{{ route('dashboard') }}" class="text-center block py-4">
                <img src="{{ asset('images/kobimbinglogo.png') }}" alt="Company Logo" class="h-16 w-auto mx-auto">
                <div class="mt-2"> <!-- Margin top for the company name -->
                    <span class="text-xl font-semibold">ASSET MANAGEMENT SYSTEM</span>
                </div>
            </a>
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 flex items-center">
                <i class="fas fa-tachometer-alt mr-2"></i> <!-- Font Awesome dashboard icon -->
                DASHBOARD
            </a>
            <a href="#" class="block py-2 px-4 flex items-center">
                <i class="fas fa-cube mr-2"></i> <!-- Font Awesome item icon -->
                ITEM
            </a>
            <a href="#" class="block py-2 px-4 flex items-center">
                <i class="fas fa-user mr-2"></i> <!-- Font Awesome user icon -->
                USER
            </a>
            <!-- Add more menu items as needed -->
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-y-auto"> <!-- Allow content scrolling -->
            <!-- Header with Navigation -->
            <header>
                @include('layouts.navigation')
            </header>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>

