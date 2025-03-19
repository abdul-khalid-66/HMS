<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlatformAdminLoginController extends Controller
{
    // Show the platform admin login form
    public function showLoginForm()
    {
        return view('auth.platform_admin_login'); // Create a view for platform admin login
    }

    // Handle platform admin login
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the platform admin
        $credentials = $request->only('email', 'password');
        if (Auth::guard('platform_admin')->attempt($credentials)) {
            // Redirect to platform admin dashboard
            return redirect()->intended('/platform-admin/dashboard');
        }

        // If authentication fails, redirect back with errors
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle platform admin logout
    public function logout()
    {
        Auth::guard('platform_admin')->logout();
        return redirect()->route('platform_admin.login');
    }
}
