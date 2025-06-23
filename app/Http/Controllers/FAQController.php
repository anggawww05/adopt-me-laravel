<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function adopter_view()
    {
        return view('faq-adopter');
    }

    public function rehomer_view()
    {
        return view('faq-rehomer');
    }
}