<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password'); // Adjust with the names of your form inputs

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect('/dashboard/main');
        }

        // If authentication fails
        return redirect()->back()->withErrors(['msg' => 'Login failed. Please check your email and password.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard-login'); // Change it to redirect to the appropriate page after logout
    }
}
