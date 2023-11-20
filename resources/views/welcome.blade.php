<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asset Management System</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #3498db, #ecf0f1);
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo img {
            height: 120px;
            width: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .link-buttons {
            margin-top: 2rem;
        }

        .link-button {
            display: inline-block;
            padding: 1.25rem 2rem;
            margin: 0.5rem;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
            background-color: #2980b9;
            color: #fff;
            cursor: pointer;
        }

        .link-button:hover {
            background-color: #3498db;
        }

        .welcome-message {
            margin-top: 2rem;
            font-size: 1.8rem;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/kobimbinglogo.png') }}" alt="Your New Logo">
        </div>

        <div class="link-buttons">
            @if (Route::has('login'))
            <div>
                @auth
                <a href="{{ url('/dashboard') }}" class="link-button">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="link-button">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="link-button">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>

        <div class="welcome-message">
            <p>Effortless Asset Control with KOBIMBING Asset Management System</p>
        </div>
    </div>
</body>

</html>