<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function list(Request $request)
    {
        return view('album.list');
    }

    public function album(Request $request, $album)
    {
        return view('album.detail');
    }
}
