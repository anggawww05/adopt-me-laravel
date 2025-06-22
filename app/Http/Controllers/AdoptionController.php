<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdoptionController extends Controller
{
    public function create(): View
    {
        return view('form-adopter');
    }

}