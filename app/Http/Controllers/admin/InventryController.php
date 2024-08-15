<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventryController extends Controller
{
    public function create(){
        return view('admin.inventry.create');
    }
}
