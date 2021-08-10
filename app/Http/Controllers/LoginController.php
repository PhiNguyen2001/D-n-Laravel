<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('frontend.login');
    }
    public function register()
    {
        return view('frontend.register');
    }
    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('login')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        } else {

            $alert = 'Sai Email hoặc Mật Khẩu!';

            return redirect()->back()->with('alert', $alert);
        }
    }
    public function dashboard()
    {

        $loginUser = Auth::guard('login')->user();
        return view('admin.dashboard', ['user' => $loginUser]);
    }
    public function logout()
    {
        Auth::guard('login')->logout();
        return redirect('/login');
    }
}
