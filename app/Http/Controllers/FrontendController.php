<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home($value='')
    {
    	return view('frontend.home');
    }
}
