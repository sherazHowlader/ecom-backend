<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(): string
    {
        return 'welcome to customer middleware route';
    }

    public function check()
    {
        return view('errors.744725');
    }

    public function userInfo(Request $request)
    {
        // return response()->json($request->user());
        try {
            $user = $request->user();
            if ($user) {
                return response()->json($user);
            } else {
                return response()->json(['error' => 'User not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server error'], 500);
        }
    }
}
