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
        /* Your existing styles */
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

        #itemDropdownContent {
            max-height: 200px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #4a5568 #cbd5e0;
            /* Adjust colors as needed */
        }

        #itemDropdownContent::-webkit-scrollbar {
            width: 10px;
            /* Adjust the width as needed */
        }

        #itemDropdownContent::-webkit-scrollbar-thumb {
            background-color: #4a5568;
            /* Adjust the color as needed */
        }

        #itemDropdownContent::-webkit-scrollbar-track {
            background-color: #cbd5e0;
            /* Adjust the color as needed */
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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
            <div class="relative">
                <button id="itemDropdown" class="block py-2 px-4 flex items-center w-full focus:outline-none" onclick="toggleDropdown('itemDropdownContent')">
                    <i class="fas fa-cube mr-2"></i>
                    ITEM
                    <i class="fas fa-angle-down ml-auto"></i>
                </button>
                <div id="itemDropdownContent" class="hidden relative bg-gray-700 py-2 mt-2 w-full z-10 rounded">
                    <a href="#" class="block py-2 px-4">DESKTOP</a>
                    <a href="#" class="block py-2 px-4">NOTEBOOK</a>
                    <a href="#" class="block py-2 px-4">PRINTER</a>
                    <a href="#" class="block py-2 px-4">SMARTPHONE</a>
                    <a href="#" class="block py-2 px-4">CAMERA DSLR</a>
                    <a href="#" class="block py-2 px-4">VOICE RECORDER</a>
                    <a href="#" class="block py-2 px-4">PROJECTOR</a>
                    <a href="#" class="block py-2 px-4">MYCARD READER</a>
                    <a href="#" class="block py-2 px-4">BARCODE SCANNER</a>
                    <a href="#" class="block py-2 px-4">WALKIE TALKIE</a>
                    <a href="#" class="block py-2 px-4">UPS</a>
                    <a href="#" class="block py-2 px-4">SOFTWARE</a>
                    <a href="#" class="block py-2 px-4">HARD DISK</a>
                    <a href="#" class="block py-2 px-4">CAFETERIA</a>
                    <a href="#" class="block py-2 px-4">PHOTOSTAT MACHINE</a>
                    <a href="#" class="block py-2 px-4">MASIH DALAM SIMPANAN</a>
                    <a href="#" class="block py-2 px-4">OTHER</a>
                    <!-- Add more items as needed -->
                </div>
            </div>
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

    <script>
        function toggleDropdown(elementId) {
            const dropdown = document.getElementById(elementId);

            // Toggle the fade-in class along with the hidden class
            dropdown.classList.toggle('hidden');
            dropdown.classList.toggle('fade-in');
        }

        // Close dropdowns when clicking outside
        window.addEventListener('click', function(event) {
            const dropdown = document.getElementById('itemDropdownContent');
            if (!event.target.closest('.relative')) {
                dropdown.classList.remove('fade-in');
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>