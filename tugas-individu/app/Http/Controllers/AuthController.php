<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login_page');
    }

    // Handle login logic
    public function login(Request $request)
    {
        // Validate the form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            // Redirect to the homepage or intended route after login
            return redirect()->intended(route('home'))->with('success', 'Login successful');
        }

        // If authentication fails, return back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have successfully logged out.');
    }
    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register_page');
    }

    // Handle registration logic
    public function register(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user in the database
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Hash the password
        ]);

        // Log the user in automatically
        Auth::login($user);

        // Regenerate session to prevent fixation attacks
        $request->session()->regenerate();

        // Redirect to the homepage with a success message
        return redirect()->route('home')->with('success', 'Registration successful! Welcome, ' . $user->name);
    }
}
