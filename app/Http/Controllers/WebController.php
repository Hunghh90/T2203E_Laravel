<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function aboutUs()
    {
        return view("aboutus");
    }

    public function home()
    {
        return view("welcome");
    }
}
