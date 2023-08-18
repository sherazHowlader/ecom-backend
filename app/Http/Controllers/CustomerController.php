<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = $request->user();    
        $user['full_name'] = $user->full_name;
        return response()->json($user);
    }
}
