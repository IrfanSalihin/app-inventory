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

    <!-- Link the custom CSS file with cache busting -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Cache control meta tags -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <style>
        /* Your existing styles */
        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            background-color: #1a202c;
            color: #cbd5e0;
            transition: width 0.5s;
        }

        .sidebar a {
            color: #cbd5e0;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #2d3748;
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

        .dropdown-item {
            padding: 12px 20px;
            transition: background-color 0.3s;
        }

        .dropdown-item:hover {
            background-color: #2d3748;
        }

        .sidebar-divider {
            border-bottom: 1px solid #2d3748;
            margin: 10px 0;
        }

        .sidebar-heading {
            font-size: 0.75rem;
            text-transform: uppercase;
            padding: 10px 20px;
            color: #a0aec0;
            letter-spacing: 1px;
        }

        /* New styles for animations */
        .sidebar a i {
            transition: transform 0.3s;
        }

        .sidebar a:hover i {
            transform: translateX(5px);
        }

        .sidebar-heading {
            transition: transform 0.3s;
        }

        .sidebar-heading:hover {
            transform: translateX(3px);
        }

        /* CSS */
        .sidebar-spacing {
            margin-top: 20px;
            /* Adjust the margin-top value as needed */
        }

        /* Hide scrollbar for the entire page */
        body {
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* Internet Explorer and Edge */
        }

        /* Hide scrollbar for specific element */
        /* Add this if you only want to hide scrollbar for the sidebar */
        .sidebar {
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* Internet Explorer and Edge */
        }

        /* Optional: If you want to apply a custom scrollbar style */
        /* This is only supported in some browsers and may not work in all */
        /* You can customize these styles according to your preference */
        ::-webkit-scrollbar {
            display: none;
            /* Hide scrollbar for WebKit browsers (Chrome, Safari, etc.) */
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
                : route('dashboard') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                <i class="fas fa-tachometer-alt mr-3"></i>
                <span>Dashboard</span>
            </a>
            <div class="sidebar-heading">IT Inventory</div>
            <div class="overflow-y-auto max-h-80"> <!-- Added overflow-y-auto and max-h-80 -->
                <a href="{{ route('desktops.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-desktop mr-3"></i>
                    <span>Desktop</span>
                </a>
                <a href="{{ route('notebooks.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-laptop mr-3"></i>
                    <span>Notebook</span>
                </a>
                <a href="{{ route('printers.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-print mr-3"></i>
                    <span>Printer</span>
                </a>
                <a href="{{ route('smartphones.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-mobile-alt mr-3"></i>
                    <span>Smartphone</span>
                </a>
                <a href="{{ route('cameras.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-camera mr-3"></i>
                    <span>Camera</span>
                </a>
                <a href="{{ route('ipads.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-tablet mr-3"></i>
                    <span>iPad</span>
                </a>
                <a href="{{ route('voicerecorders.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-microphone mr-3"></i>
                    <span>Voice Recorder</span>
                </a>
                <a href="{{ route('projectors.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-video mr-3"></i>
                    <span>Projector</span>
                </a>
                <a href="{{ route('mycardreaders.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-id-card mr-3"></i>
                    <span>MyCard Reader</span>
                </a>
                <a href="{{ route('barcodescanners.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-barcode mr-3"></i>
                    <span>Barcode Scanner</span>
                </a>
                <a href="{{ route('walkietalkies.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <!-- Inline SVG for Walkie Talkie Icon -->
                    <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 5h5v2H6V5zm0 4h5v2H6V9zm0 4h5v2H6v-2zm7-8h2v6h-2V5zm0 8h2v2h-2v-2zm-1 2h-1v-2H7v-2H6V9H5V7h1V5H5V3H3v14h14V3h-4V1h6v16H1V1z" clip-rule="evenodd" />
                    </svg>
                    <span>Walkie Talkie</span>
                </a>

                <a href="{{ route('upowersupps.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-plug mr-3"></i>
                    <span>UPS</span>
                </a>
                <a href="{{ route('softs.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-cubes mr-3"></i>
                    <span>Software</span>
                </a>
                <a href="{{ route('harddisks.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-hdd mr-3"></i>
                    <span>Hard Disc</span>
                </a>
                <a href="{{ route('cafeterias.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-coffee mr-3"></i>
                    <span>Cafeteria</span>
                </a>
                <a href="{{ route('photostatemacs.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-copy mr-3"></i>
                    <span>Photostat Machine</span>
                </a>
                <a href="{{ route('reserveditems.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-box-open mr-3"></i>
                    <span>Reserve</span>
                </a>
                <a href="{{ route('damageditems.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-exclamation-triangle mr-3"></i>
                    <span>Damaged</span>
                </a>
                <a href="{{ route('others.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                    <i class="fas fa-cogs mr-3"></i>
                    <span>Others</span>
                </a>
            </div>

            <!-- HTML -->
            <div class="sidebar-spacing"></div>

            <div class="sidebar-heading">Admin Tools</div>
            <a href="#" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                <i class="fas fa-envelope mr-3"></i>
                <span>Email Maintenance</span>
            </a>
            @if (auth()->check() && auth()->user()->isAdmin())
            <a href="{{ route('user.index') }}" class="block py-3 pl-5 pr-4 flex items-center hover:bg-gray-700">
                <i class="fas fa-users mr-3"></i>
                <span>User List</span>
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
                {{$slot}}
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