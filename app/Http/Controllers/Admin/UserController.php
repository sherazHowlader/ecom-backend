<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function show(User $user): View
    {
        return view('user.details', compact('user'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        toast('User delete success', 'success');
        return redirect()->route('user.index');
    }
}
