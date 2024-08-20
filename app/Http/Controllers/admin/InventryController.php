<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inventry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventryController extends Controller
{
    public function create(){
        return view('admin.inventry.create');
    }

    public function index(Request $request)
    {
        $inventries = Inventry::latest();
    
        if (!empty($request->get('keyword'))) {
            $inventries = $inventries->where('name', 'like', '%' . $request->get('keyword') . '%');
        }
    
        $inventries = $inventries->paginate(10);
    
        return view('admin.inventry.product_list', compact('inventries'));
    }

    public function store(Request $request){
       $validator = Validator::make($request->all(),[
        'name' => 'required',
        'description' => 'required',
        'price' => 'required'
       
       ]);

       if ($validator->passes()) {
        $inventry = new Inventry();
        $inventry->name = $request->name;
        $inventry->description = $request->description;
        $inventry->price = $request->price;
        $inventry->save();
    
        // $request->session()->flash('success', 'Category added successfully');

    
        return response()->json([
            'status' => true,
            'message' => 'Inventry added successfully'  
        ]);
    }else{
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);

        
       }
    }
}
