<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(request $req){
        return view('index');
    }
    public function category(request $req){
        return view('category');
    }
    public function subcategory(request $req){
        return view('subcategory');
    }
}
