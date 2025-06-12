<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function privacypolicy()
    {
        return view('pages.privacypolicy');
    }
    public function reradisclaimer()
    {
        return view('pages.reradisclaimer');
    }
    public function termscondition()
    {
        return view('pages.termscondition');
    }


}
