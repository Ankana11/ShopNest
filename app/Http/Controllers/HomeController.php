<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Showing home page

    public function index(){
    return view('front.home');
    }

    public function shop_details(){
     return view('front.shop_details');
    }

    public function cart(){
     return view('front.cart');
    }
}
