<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->guard('web')->attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->back()->withInput($request->only('email'))->with('error', 'Email atau password salah.');
        }
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('admin.login');
    }
}
