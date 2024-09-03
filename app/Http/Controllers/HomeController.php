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
        // Retrieve current cart from session
        $cart = session()->get('cart', []);
    
        // Retrieve input data
        $image = $request->input('image');
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity', 1);
    
        // Calculate total price for the current item
        $totalprice = $price * $quantity;
    
        // Initialize grand total
        $grandTotal = 0;
    
        // Check if item already exists in cart based on ID
        $itemExists = false;
        foreach ($cart as &$item) {
            if (isset($item['id']) && $item['id'] === $id) {
                // Update quantity and total price if item already exists
                $item['quantity'] += $quantity;
                $item['totalprice'] += $totalprice;
                $itemExists = true;
                break;
            }
        }
    
        // If item is not already in cart, add it as a new item
        if (!$itemExists) {
            $item = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'image' => $image,
                'totalprice' => $totalprice,
            ];
    
            $cart[] = $item;
        }
    
        // Calculate grand total price for all items in cart
        foreach ($cart as $item) {
            $grandTotal += $item['totalprice'];
        }
    
        // Store grand total separately in the session under a different key
        session()->put('cart', $cart);
        session()->put('grandtotal', $grandTotal);
    
        // Redirect to cart page
        return redirect()->route('cart');
    }
    
    
    
    public function cart() {
      
        $cart = session()->get('cart', []);
        $grandTotal = session()->get('grandtotal', 0);
        return view('front.cart', compact('cart', 'grandTotal'));
    }

}
