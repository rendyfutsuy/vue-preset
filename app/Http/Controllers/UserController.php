<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function list(Request $request)
    {
        return view('user.list');
    }

    public function user(Request $request, $user)
    {
        return view('user.detail');
    }
}
