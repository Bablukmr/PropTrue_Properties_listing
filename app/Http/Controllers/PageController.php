<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
        return view('pages.contact');
    }
    public function joinus()
    {
        return view('pages.joinus');
    }
    public function assosiatewithus()
    {
        return view('pages.assosiatewithus');
    }
    public function aboutus()
    {
        return view('pages.aboutus');
    }
    public function ourteam()
    {
        return view('pages.ourteam');
    }

}
