<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

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
            'user' => $user,
            'token' => $token,
            'message' => 'User login success'
        ];

        return response()->json($response, 200);
    }

    public function register(Request $request)
    {
        // validation
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required|email',
            'password'   => 'required',
            'c_password' => 'required|same:password'
        ]);


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('apiToken')->plainTextToken;

        $response = [
            'success' => true,
            'user' => $user,
            'token' => $token,
            'message' => 'User register successfully'
        ];

        return response()->json($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        $response = [
            'success' => true,
            'message' => 'User logout success'
        ];

        return response()->json($response, 200);
    }

    public function mytoken()    {
//      return $request->bearerToken();
        return $token = Cookie::get('access_token');
    }
}
