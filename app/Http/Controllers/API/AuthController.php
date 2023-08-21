<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){
            $user['full_name'] = $user->full_name;
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            $response = [
                'message' => 'Email or Password is wrong'
            ];
            return response()->json($response);
        }

        $token = $user->createToken('apiToken')->plainTextToken;
        Cookie::queue(Cookie::make('access_token', $token, 1440, '/', null, true, true));

        $response = [
            'success' => true,
            'user'    => $user,
            'token'   => $token,
            'message' => 'Welcome back! You have successfully logged in'
        ];

        return response()->json($response, 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'c_password' => 'required|same:password'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password)
        ]);
        $user['full_name'] = $user->full_name;
        
        $token = $user->createToken('apiToken')->plainTextToken;
        Cookie::queue(Cookie::make('access_token', $token, 1440, '/', null, true, true));

        $response = [
            'success' => true,
            'user'    => $user,
            'token'   => $token,
            'message' => 'You have successfully registered'
        ];

        return response()->json($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $response = [
            'success' => true,
            'msg'     => 'You have been securely logged out'
        ];
        return response()->json($response)->withCookie(Cookie::forget('access_token'));
    }

    public function mytoken()
    {
        return Cookie::get('access_token');
    }
}