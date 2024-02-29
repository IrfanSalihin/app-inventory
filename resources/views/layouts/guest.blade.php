<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Authentication</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #2980b9, #6dd5fa);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .auth-container {
            background: #fff;
            max-width: 400px;
            width: 90%;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .auth-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        .auth-container h1 {
            color: #333;
            margin-bottom: 20px;
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

        .auth-container form label {
            display: block;
            margin-bottom: 10px;
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
            font-size: 16px;
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
            transition: color 0.3s ease;
        }

        .auth-container .switch-link:hover {
            color: #2980b9;
        }

        .auth-container .logo {
            width: 110px;
            /* Adjusted logo width */
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="auth-container">
        @if(Request::is('register'))
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
                <option value="GA">GA</option>
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
        <img src="{{ asset('images/kobimbinglogo.png') }}" alt="Your Logo" class="logo">
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