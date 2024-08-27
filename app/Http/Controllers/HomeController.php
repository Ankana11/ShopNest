<?php

namespace App\Http\Controllers;

use App\Models\Inventry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Showing home page

    public function index(Request $request){
        $inventries = Inventry::where('active', 0)->latest()->get();
        return view('front.home', compact('inventries'));
    }

    public function shop_details($id){
        $inventry = Inventry::find($id);

        if(!empty($invebtrty)){
            return redirect()->route('home')->with('error', 'Product not found.');
        }
        return view('front.shop_details', compact('inventry'));
    }
    

    public function cart(){
     return view('front.cart');
    }

}
