<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'name' => 'required|string|max:50',
            'password' => 'required|string',
        ]);

        // Attempt to log in using the provided credentials and the Auth facade (class)
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation
            $request->session()->regenerate();

            // Redirect to intended page or home
            return redirect()->intended('/music');
        }

        // Invalid credentials, output error message
        return back()->withErrors([
            'name' => 'Invalid credentials.',
        ])->withInput();
    }

    // Handle logout
    public function logout(Request $request)
    {

        // Log the user out
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Optionally, you can perform a redirect after logging out
        return redirect('auth/login')->with('status', 'You have been successfully logged out.');
    }
}
