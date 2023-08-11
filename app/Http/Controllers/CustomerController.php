<?php

namespace App\Http\Controllers;

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
}
