<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.index');
    }

    // public function add_register(Request $request)
    // {
    //     dd($request);
    // }
}
