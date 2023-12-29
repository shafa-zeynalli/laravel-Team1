<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

//        return redirect()->back();
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

//            return redirect()->back();
            return redirect()->intended('/blog ');

        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }





    public function accountDetails()
    {
        return view('front.auth.account.accountdetails');
    }
    public function accountOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
//        dd($orders);
        return view('front.auth.account.accountorders', compact('orders'));
    }
    public function accountDashboard()
    {
        return view('front.auth.account.accountdashboard');
    }
    public function accountLogOut()
    {
        return view('front.auth.account.accountlogout');
    }

    public function logOut()
    {
        Auth::logout();
        return view('front.auth.login');
    }


    public function updatePassword(Request $request)
    {
       $data = $request->validate([
            'email' => 'required|email',
            'current_password' => 'required|min:4',
            'password' => 'required|min:4',
            'password_confirmation' => 'required_with:password|same:password',
        ]);

        $user = Auth::user();
//        dd($user);
        if ($user->email !== $request->email) {
            return back()->withErrors(['email' => 'The provided email does not match your account.']);
        }

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            Auth::logout();
            return redirect()->route('front.login')->with('success', 'Password changed successfully.');
        }

        return back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

}
