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

    public function store(Request $request)
    {
        $data = Page::findOrFail(1);
        if($request->page == 'aboutus'){
            $data->about_us = $request->content;
        }
        if($data->save()){
            return redirect()->route('admin.pages.about-us')->with('success', 'New Category created successfully.');
        }else{
            return redirect()->route('admin.pages.about-us')->with('error', 'Error while creating new category');
        }
    }
}
