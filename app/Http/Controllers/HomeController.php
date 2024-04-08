<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::where(['parent_id'=> NULL,'status'=> 1 ])->orderBy('title','asc')->take(5)->get();
        return view('home')->with('data',$data);
    }
    public function category($id)
    {
        $data['categories'] = Category::where(['parent_id'=> $id,'status'=> 1 ])->orderBy('title','asc')->get();
        if(count($data['categories']) > 0){
            return view('category')->with('data',$data);
        }else{
            return redirect()->route('categorydetails',['id' => $id]);
        }
    }
    public function subcategory($id)
    {
        $data['categories'] = Category::where(['parent_id'=> $id,'status'=> 1 ])->orderBy('title','asc')->get();
        if(count($data['categories']) > 0){
            return view('subcategory')->with('data',$data);
        }else{
            return redirect()->route('categorydetails',['id' => $id]);
        }
    }

    public function categoryDetail(Request $request)
    {
        $getcat = Category::where('id',$request->id)->get();

        if($getcat[0]->title == "Health Authority Sites"){
            return view('health-authority');
        }else{
            return view('single_category');
        }
    }

    public function partner_details()
    {
        return view('partner-details');
    }

    
    public function jobs()
    {
        return view('jobs');
    }

    public function consultants()
    {
        return view('consultants');
    }

    public function health_authority()
    {
         return view('health-authority');
    }
}
