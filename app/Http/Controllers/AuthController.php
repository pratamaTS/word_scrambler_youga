<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postLogin(Request $request)
    {
        $user = Auth::user();
        $credential = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credential)) {
            if (auth()->user()->is_admin) {
                return redirect(route('admin.index'));
            }

            return redirect(route('game.index'));
        }

        return back()->withInput()->with([
            'type'    => 'wrong',
            'message' => 'Invalid email or password!'
        ]);
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if (! $user) {
            return back()->with([
                'type'    => 'wrong',
                'message' => 'Registration error, try again!'
            ]);
        }

        return redirect(route('auth.login'))->with([
            'type'    => 'correct',
            'message' => 'Registration completed!'
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('auth.login'));
    }
}
