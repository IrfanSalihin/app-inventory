<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Retrieve all users from the database
        $users = User::all();

        // Pass the users to the view
        return view('users.index', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }

    public function showRegistrationForm()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
        // Validate the user input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:IT,GA', // Adjust as needed
            'permission' => 'required|string|in:Admin,User', // Adjust as needed
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'permission' => $request->permission,
        ]);

        return redirect()->route('user.index')->with('success', 'User registered successfully.');
    }
}
