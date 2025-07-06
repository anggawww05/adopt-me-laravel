<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'Email tidak boleh kosong.',
                'email.email' => 'Email tidak valid.',
                'password.required' => 'Password tidak boleh kosong.',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // ## This is the corrected logic ##
            // Check if the logged-in user's role permission is 'Admin'
            if (Auth::user()->role->permission === 'Admin') {
                // If yes, redirect to the admin dashboard route
                return redirect()->route('admin.dashboard');
            }

            // For all other roles, redirect to the main landing page
            return redirect()->intended(route('landing'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
