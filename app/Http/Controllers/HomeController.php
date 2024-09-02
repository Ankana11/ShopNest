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
    

    public function addToCart(Request $request) {
       
        $cart = session()->get('cart', []);
    
       $image = $request->input('image');
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity', 1); 
    
       
        $item = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $image
        ];
    
     
        $cart[] = $item;
    
       
        session()->put('cart', $cart);
    
      
        return redirect()->route('cart');
    }
    
    public function cart() {
      
        $cart = session()->get('cart', []);
        return view('front.cart', compact('cart'));
    }

}
