<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicersLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:servicer')->except('logout');
    }

    public function showLogin()
    {
        return view('auth.servicerLogin');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attemp to log user in
        if (Auth::guard('servicer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful, then redirect to their intended location
            // Redirect where they try to go - laravel track before they pull out them to login
            return redirect()->intended(route('servicer.dashboard'));
        }

        // If unsuccessful, then redirect bact to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
