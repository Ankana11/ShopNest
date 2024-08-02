<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function register(){
        return view('front.account.register');
        }
    public function login(){
        return view('front.account.login');
        }

        public function processreg(Request $req){
           $validator = Validator::make($req->all(),[
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'mobile' => 'required|max:10',
        'address' => 'required|',
        'pass' => 'required|same:cpass',
        'cpass' => 'required',
           ]);
           if($validator->passes()){
            // $user = new User();
            // $user->name = $req->name;
            // $user->email = $req->email;
            // $user->password = ($req->pass);
            
            // $user->save();
            
            // session()->flash('success','You Have Register Successfully');
            
                }  
                else{
                return response()->json([
                'status'=> false,
                'errors'=> $validator->errors()
            
                ]);
                }
             }
}
