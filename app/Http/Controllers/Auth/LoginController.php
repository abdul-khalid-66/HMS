<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends BaseController
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin') || $user->hasRole('super-admin')) {
            return redirect()->route('admin_dashboard');
        } elseif ($user->hasRole('teacher')) {
            return redirect()->route('teacher_dashboard');
        } elseif ($user->hasRole('student')) {
            return redirect()->route('student_dashboard');
        } else {
            return "No role assigned";
        }


        return redirect($this->redirectTo);
    }
}
