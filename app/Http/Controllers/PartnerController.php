<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function dashboard()
    {
        return view('partners.dashboard');
    }

    public function register()
    {
        return view('partners.register');
    }
}
