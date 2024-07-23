<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FrontPages extends Controller
{
    public function aboutAS()
    {
        $title = "About-As";
        return view('aboutAS', compact('title'));
    }

    public function contactUs()
    {
        $title = "Contact-Us";
        return view('contact' ,compact('title'));
    }
}