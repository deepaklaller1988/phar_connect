<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Page;
class HomeController extends Controller
{
    public function index()
    {
        $data['featured_partners'] = User::where(['is_featured' => 1, 'type'=>2])->get();
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
        $parent = Category::where('id',$id)->get();
        if($parent[0]->parent_id != NULL){
            $datas['maincategories'] = Category::where('parent_id',$parent[0]->parent_id)->get();
        }
        foreach($datas['maincategories'] as $key=> $mcategory){
            $datas[$key]['subcategories'] = Category::where('parent_id',$mcategory->id)->get();
            foreach($datas[$key]['subcategories'] as $skey => $scategory){
                $datas[$key][$skey]['childcategory'] = Category::where('parent_id',$scategory->id)->get();
            }
        }
       
        $data['categories'] = Category::where(['parent_id'=> $id,'status'=> 1 ])->orderBy('title','asc')->get();
        // dd($data);
        if(count($data['categories']) > 0){
            return view('subcategory')->with(['data'=> $data,'categories'=>$datas]);
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

    public function about_us()
    {
        $aboutus = Page::get('about_us');
        return view('about-us')->with('aboutus',$aboutus);
    }

    public function terms_and_conditions()
    {
        $tnc = Page::get('terms_and_conditions');
        return view('terms_and_conditions')->with('tnc',$tnc);
    }

    public function faq()
    {
        $faq = Page::get('faq');
        return view('faq')->with('faq',$faq);
    }

    public function privacy_policy()
    {
        $pp = Page::get('privacy_policies');
        return view('privacy-policy')->with('pp',$pp);
    }

    public function posts()
    {
        return view('post-list');
    }
}
