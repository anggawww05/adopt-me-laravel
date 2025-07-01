<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RehomerController extends Controller
{
    public function view()
    {
        return view('form-rehomer');
    }
}
