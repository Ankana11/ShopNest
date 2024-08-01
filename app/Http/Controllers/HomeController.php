<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Showing home page

    public function index(){
return view('front.home');
    }
}
