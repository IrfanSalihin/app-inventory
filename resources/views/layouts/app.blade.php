<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Link the custom CSS file -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            background-color: #1a202c;
            color: #cbd5e0;
        }

        .sidebar a {
            color: #cbd5e0;
        }

        /* Remove the hover effect */
        .sidebar a:hover {
            background-color: transparent;
        }

        header {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        main {
            background-color: #f7fafc;
            min-height: calc(100vh - 4rem);
        }

        .company-logo {
            max-width: 100px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <div class="sidebar bg-gray-800 text-white w-64 flex-shrink-0">
            <a href="{{ 
                auth()->check() ? 
                    (auth()->user()->isAdmin() ? route('admin.dashboard') :
                    (auth()->user()->isITUser() ? route('it.user.dashboard') :
                    (auth()->user()->isGAUser() ? route('ga.user.dashboard') : route('dashboard'))))
                : route('dashboard') }}" class="text-center block py-4">
                <img src="{{ asset('images/kobimbinglogo.png') }}" alt="Company Logo" class="company-logo mx-auto">
                <div class="mt-2">
                    <span class="text-xl font-semibold">ASSET MANAGEMENT SYSTEM</span>
                </div>
            </a>
            <a href="{{ 
                auth()->check() ? 
                    (auth()->user()->isAdmin() ? route('admin.dashboard') :
                    (auth()->user()->isITUser() ? route('it.user.dashboard') :
                    (auth()->user()->isGAUser() ? route('ga.user.dashboard') : route('dashboard'))))
                : route('dashboard') }}" class="block py-2 px-4 flex items-center">
                <i class="fas fa-tachometer-alt mr-2"></i>
                DASHBOARD
            </a>
            <a href="#" class="block py-2 px-4 flex items-center">
                <i class="fas fa-cube mr-2"></i>
                ITEM
            </a>
            {{-- Check if the authenticated user is an IT Admin before rendering the USER menu --}}
            @if (auth()->check() && auth()->user()->isAdmin())
            <a href="#" class="block py-2 px-4 flex items-center">
                <i class="fas fa-user mr-2"></i>
                USER
            </a>
            @endif
        </div>

        <div class="flex-1 overflow-y-auto">
            <header>
                @include('layouts.navigation')
            </header>

            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>