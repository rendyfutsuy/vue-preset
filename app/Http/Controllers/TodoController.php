<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    public function list(Request $request)
    {
        return view('todo.list');
    }

    public function todo(Request $request, $todo)
    {
        return view('todo.detail');
    }
}
