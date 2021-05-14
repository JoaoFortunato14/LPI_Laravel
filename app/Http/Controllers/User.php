<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class User extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        
        return view('profile');
    }

    public function map(){
        
        return view('userMap');
    }

    public function draw(){
        return view('drawMap');
    }
}
