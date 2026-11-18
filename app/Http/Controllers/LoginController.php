<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $credentials =$request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);

            if ($user->role === 'pengurus'){
                return redirect('/pengurus');
            } else if ($user->role === 'warga') {
                return redirect('/warga');
            }
        }

        return back()->withErrors(['username' => 'username atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
