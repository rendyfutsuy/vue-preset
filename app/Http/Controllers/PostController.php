<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function list(Request $request)
    {
        return view('post.list');
    }

    public function post(Request $request, $post)
    {
        return view('post.detail');
    }
}
