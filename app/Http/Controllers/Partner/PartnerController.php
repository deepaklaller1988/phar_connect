<?php

namespace App\Http\Controllers\Partner;
use App\Http\Controllers\Controller;
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
    public function profile()
    {
        return view('partners.profile.profile');
    }
}
