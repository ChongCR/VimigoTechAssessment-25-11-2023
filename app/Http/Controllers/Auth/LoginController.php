<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/index';

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $token = $user->createToken('Personal Access Token')->accessToken;

            return redirect('/index')->with('access_token', $token);
        } else {

            return back()->with('credential', 'Invalid credentials');
        }
    }




public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {

        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });


        Auth::logout();


        return redirect('/login');
    }


}
