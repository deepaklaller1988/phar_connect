<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Slider;
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

    public function sliders(){
        $sliders = Slider::all();
        return view('admin.pages.slider')->with('sliders',$sliders);
    }
    public function add()
    {
        return view('admin.pages.slider-add');
    }

    public function store_slider(Request $request)
    {
        $slider = new Slider;
        $slider->description = $request->content;
        $slider->image = $request->image;
        if($request->has('slider_image')){
            $image = $request->file('slider_image');
            $imagePath = $image->store('uploads/sliders', 'public');
            $slider->image = $imagePath;
        }
        if($slider->save()){
            return redirect()->route('admin.pages.sliders')->with('success', 'Slider Added Successfully');
        }else{
            return redirect()->back()->with('error', 'Error while adding slider');
        }
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.pages.slider-edit')->with('slider',$slider);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->description = $request->content;
        $slider->image = $request->image;
        if($request->has('slider_image')){
            $image = $request->file('slider_image');
            $imagePath = $image->store('uploads/sliders', 'public');
            $slider->image = $imagePath;
        }
        if($slider->save()){
            return redirect()->route('admin.pages.sliders')->with('success', 'Slider Updated Successfully');
        }else{
            return redirect()->back()->with('error', 'Error while updating slider');
        }
    }

    public function delete($id)
    {
        Slider::find($id)->delete();
        return response()->json(['success'=>'Slider deleted successfully.']);
    }
}
