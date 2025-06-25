<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function indexAdopt()
    {
        return view('adoptpost');
    }

    public function indexDetail()
    {
        return view('detailadopt');
    }
}
