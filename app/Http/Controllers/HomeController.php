<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function register(request $request){
        $validated =$request=>validate([
            "name"=>"required";
            "email"=>"required/email";
            "password"=>"required";
        ]);
        $user= new user
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        echo "user account created";
    }
}
