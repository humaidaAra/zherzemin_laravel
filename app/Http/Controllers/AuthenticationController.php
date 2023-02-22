<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $auth = auth()->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if (!$auth) {
            return redirect('login')->withErrors('Wrong credentials.');
        }

        $request->session()->regenerate();
        return redirect('admin/articles');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
