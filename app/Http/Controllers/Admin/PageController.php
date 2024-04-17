<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    public function about_us()
    {
        $aboutus = Page::get('about_us');
        return view('admin.pages.about-us')->with('aboutus',$aboutus);
    }

    public function terms_and_conditions()
    {
        $tnc = Page::get('terms_and_conditions');
        return view('admin.pages.terms-and-conditions')->with('tnc',$tnc);
    }

    public function faq()
    {
        $faq = Page::get('faq');
        return view('admin.pages.faq')->with('faq',$faq);
    }

    public function privacy_policies()
    {
        $pp = Page::get('privacy_policies');
        return view('admin.pages.privacy-policy')->with('pp',$pp);
    }

    public function contact_us()
    {
        $contactus = Page::get('contact_info');
        return view('admin.pages.contact-us')->with('contactus',$contactus);
    }

    public function store(Request $request)
    {
        $data = Page::findOrFail(1);
        if($request->page == 'aboutus'){
            $data->about_us = $request->content;
        }elseif($request->page == 'tnc'){
            $data->terms_and_conditions = $request->content;
        }elseif($request->page == 'pp'){
            $data->privacy_policies = $request->content;
        }elseif($request->page == 'contactus'){
            $data->contact_info = $request->content;
        }else{
            $data->faq = $request->content;
        }
        if($data->save()){
            return redirect()->back()->with('success', 'Content Saved successfully.');
        }else{
            return redirect()->route()->with('error', 'Error while creating new category');
        }
    }
}
