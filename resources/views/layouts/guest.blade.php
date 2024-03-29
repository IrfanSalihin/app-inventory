<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentication</title>
    <link rel="shortcut icon" href="{{ asset('asset.ico') }}" type="image/x-icon">
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

        .auth-container {
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

        .auth-container h1 {
            margin-bottom: 2rem;
            font-size: 2rem;
            color: #333;
        }

        .auth-container form input[type="text"],
        .auth-container form input[type="email"],
        .auth-container form input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #f5f5f5;
            transition: background-color 0.3s ease;
        }

        .auth-container form input[type="text"]:focus,
        .auth-container form input[type="email"]:focus,
        .auth-container form input[type="password"]:focus {
            background-color: #e0e0e0;
        }

        .auth-container form label,
        .auth-container form select option {
            color: #333;
            /* Adjusting the font color */
        }

        .auth-container form select {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #f5f5f5;
            transition: background-color 0.3s ease;
        }

        .auth-container form select:focus {
            background-color: #e0e0e0;
        }

        .auth-container form button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .auth-container form button:hover {
            background-color: #2980b9;
        }

        .auth-container .switch-link {
            color: #333;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .auth-container .switch-link:hover {
            color: #2980b9;
        }

        .auth-container .logo img {
            height: 120px;
            width: auto;
            transition: transform 0.5s ease;
        }

        .auth-container .logo img:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="auth-container">
        @if(Request::is('register'))
        <div class="logo">
            <img src="{{ asset('images/kobimbinglogo.png') }}" alt="Your Logo">
        </div>
        <h1>User Registration</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <input type="text" name="name" placeholder="Name" required autofocus>
            <!-- Email Address -->
            <input type="email" name="email" placeholder="Email" required>
            <!-- Password -->
            <input type="password" name="password" placeholder="Password" required>
            <!-- Confirm Password -->
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <!-- Role -->
            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="IT">IT</option>
                <!-- <option value="GA">GA</option> -->
            </select>
            <!-- Permission -->
            <label for="permission">Permission</label>
            <select name="permission" id="permission">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
            <button type="submit">Register</button>
        </form>
        <a href="{{ route('login') }}" class="switch-link">Already registered? Log in</a>
        @else
        <div class="logo">
            <img src="{{ asset('images/kobimbinglogo.png') }}" alt="Your Logo">
        </div>
        <h1>Asset Management System</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <input type="email" name="email" placeholder="Email" required autofocus>
            <!-- Password -->
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log in</button>
        </form>
        @endif
    </div>
</body>

</html>