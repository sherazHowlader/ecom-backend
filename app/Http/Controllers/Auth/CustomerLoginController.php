<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer')->except( 'logout' );
    }

    public function loginForm()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended( route('check'));
        }
        return redirect()->intended( route('customer.login.form', 'status=login failed'));
    }
}
