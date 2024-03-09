<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeContoller extends Controller
{
    public function redirect()
    {
        if (Auth::user()->role == '1') {
            return view('admin.home');
        } else {
            return view('user.all');
        }
    }
}
