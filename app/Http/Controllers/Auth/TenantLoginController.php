<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TenantLoginController extends Controller
{
    // Show the tenant login form
    public function showLoginForm()
    {
        return view('auth.tenant_login'); // Create a view for tenant login
    }

    // Handle tenant login
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the tenant
        $credentials = $request->only('email', 'password');
        if (Auth::guard('tenant')->attempt($credentials)) {
            // Redirect to tenant dashboard
            return redirect()->intended('/tenant/dashboard');
        }

        // If authentication fails, redirect back with errors
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle tenant logout
    public function logout()
    {
        Auth::guard('tenant')->logout();
        return redirect()->route('tenant.login');
    }
}
