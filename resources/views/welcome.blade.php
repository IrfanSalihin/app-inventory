<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asset Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background: linear-gradient(135deg, #3498db, #8e44ad);
            color: #fff;
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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            opacity: 0;
            animation: slideIn 1s ease-out forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo img {
            height: 120px;
            width: auto;
            transition: transform 0.5s ease;
        }

        .logo img:hover {
            transform: scale(1.1);
        }

        .link-buttons {
            margin-top: 2rem;
        }

        .link-button {
            display: inline-block;
            padding: 1.5rem 3rem;
            margin: 0.5rem;
            font-size: 1.2rem;
            font-weight: 700;
            text-decoration: none;
            border-radius: 50px;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        .link-button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
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
                @if (Auth::user()->role === 'IT')
                @if (Auth::user()->permission === 'Admin')
                <a href="{{ url('/admin/dashboard') }}" class="link-button">IT Admin Dashboard</a>
                @elseif (Auth::user()->permission === 'User')
                <a href="{{ url('/it/user/dashboard') }}" class="link-button">IT User Dashboard</a>
                @endif
                @elseif (Auth::user()->role === 'GA')
                @if (Auth::user()->permission === 'User')
                <a href="{{ url('/ga/user/dashboard') }}" class="link-button">GA User Dashboard</a>
                @endif
                @else
                <a href="{{ url('/dashboard') }}" class="link-button">Dashboard</a>
                @endif
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