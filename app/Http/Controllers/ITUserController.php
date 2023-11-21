<?php

namespace App\Http\Controllers;

class ITUserController extends Controller
{
    public function index()
    {
        return view('it_user_dashboard');
    }
}
