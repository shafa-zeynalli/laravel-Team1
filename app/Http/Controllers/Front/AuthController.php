<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function sendLoginPage(){
        return view('front.auth.login');
    }

    public function register(Request $request){
        $data = $request->validate([
            'email' => 'required|max:255|unique:users|email',
            'password' =>'required|min:4',
            'password_confirmation' => 'required_with:password|same:password'
        ]);
//        $user=new User();
        $user=User::create($data);

        return redirect()->route('front.login');
    }

    public function sendSignupPage(){
        return view('front.auth.signup');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
//            Auth::loginUsingId(\auth()->id());
//            Auth::login($credentials);
//            dd(Auth::user());
            return redirect()->intended('/ ');

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function accountDetails()
    {
        return view('front.auth.account.accountdetails');
    }
}
