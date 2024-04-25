<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Page;
use App\Models\Post;
use App\Models\Plan;
use App\Models\Visitor;
use App\Models\Country;
use App\Models\Authorityregion;
class HomeController extends Controller
{
    public function index()
    {
            $visitor = Visitor::where('ip_address', request()->ip())->first();
            if(!$visitor){
                Visitor::create([
                    'ip_address' => request()->ip(),
                ]);  
            }
            $data['featured_partners'] = User::where(['is_featured' => 1, 'type'=>2])->get();
            $data['categories'] = Category::where(['parent_id'=> NULL,'status'=> 1 ])->orderBy('title','asc')->take(5)->get();
            return view('home')->with('data',$data);

    }
    public function category(Request $request,$slug)
    {
        $category = Category::where('slug',$slug)->first();
        $data['categories'] = Category::where(['parent_id'=> $category->id,'status'=> 1 ])->orderBy('title','asc')->get();
        if(count($data['categories']) > 0){
            return view('category')->with('data',$data);
        }else{
            return redirect()->route('categorydetails', $category->slug);
        }
    }
    public function subcategory(Request $request,$slug)
    {
        $parent = Category::where('slug',$slug)->first();
        if($parent->parent_id != NULL){
            $datas['maincategories'] = Category::where('parent_id',$parent->parent_id)->get();
        }
        foreach($datas['maincategories'] as $key=> $mcategory){
            $datas[$key]['subcategories'] = Category::where('parent_id',$mcategory->id)->get();
            foreach($datas[$key]['subcategories'] as $skey => $scategory){
                $datas[$key][$skey]['childcategory'] = Category::where('parent_id',$scategory->id)->get();
            }
        }
       
        $data['categories'] = Category::where(['parent_id'=> $parent->id,'status'=> 1 ])->orderBy('title','asc')->get();
        if(count($data['categories']) > 0){
            return view('subcategory')->with(['data'=> $data,'categories'=>$datas]);
        }else{
            return redirect()->route('categorydetails', $slug);
        }
    }

    public function categoryDetail(Request $request,$slug)
    {
        $getcat = Category::where('slug',$slug)->first();

        if($getcat->title == "Health Authority Sites"){
            $zones = Authorityregion::all();
            $data = array();
            foreach($zones as $key => $zone){
                $data[$key]['name'] = $zone->name;
                $data[$key]['id'] = $zone->id;
                $data[$key]['posts'] = Post::where(['zone' => $zone->id ,'status' => 1,'category_id' => $getcat->id])->get();
            }
            return view('health-authority',compact('data'));
        }else{
            return redirect()->route('posts',$slug);
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

    public function posts(Request $request,$slug)
    {   
        $getcat = Category::where('slug',$slug)->first();
        if($getcat->parent_id == 5 || $getcat->id == 5){
            $posts = Post::with('user','countrie')->where(['category_id'=>$getcat->id, 'status'=>1])->get();
            return view('jobs',compact('posts'));
        }else{
            $posts = Post::with('user')->where(['category_id'=>$getcat->id, 'status'=>1])->get();
            return view('post-list',compact('posts'));
        }
    }

    public function post_details(Request $request,$slug)
    {
        $post = Post::with('user')->where('slug',$slug)->first();
        return view('single_category',compact('post'));
    }

    public function pricing()
    {
        $plans = Plan::all();
        return view('pricing', compact('plans'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Category::where('title', 'like', '%' . $query . '%')->get();
        return response()->json($results);
    }

    public function country_search(Request $request)
    {
        $query = $request->input('query');
        $results = Country::where('country_name', 'like', '%' . $query . '%')->get();
        return response()->json($results);
    }

    // public function search_posts(Request $request,$slug="",$slug2="")
    // {
    //     if($slug1){
    //         $category = Category::where('slug',$slug)->first();
    //     }
    //     if($slug2){
    //         $country = Country::where('abbreviation', $slug2)->first();
    //     }
    //     if($category->id == 4){
    //         $posts = Post::where(['category_id'=>$category->id, 'status'=>1])->get();
    //         return view('health-authority',compact('posts'));
    //     }else{
    //         if($category->parent_id == 5 || $category->id == 5){
    //             $posts = Post::where(['category_id'=>$category->id, 'status'=>1])->get();
    //             return view('jobs',compact('posts'));
    //         }else{
    //             $posts = Post::where(['category_id'=>$category->id, 'status'=>1])->get();
    //             return view('post-list',compact('posts'));
    //         }
    //     }

    // }


    public function search_posts(Request $request,$slug="",$slug2="")
    {
        if($slug <> '-' && !$slug2 ){
            $category = Category::where('slug',$slug)->first();
            $posts = Post::where(['category_id'=>$category->id, 'status'=>1])->get();
            return view('post-list',compact('posts'));
        }elseif($slug2 && $slug == '-'){
            $country = Country::where('abbreviation', $slug2)->first();
            $posts = Post::where(['country'=>$country->id, 'status'=>1])->get();
            return view('post-list',compact('posts'));
        }elseif($slug <> '-' && $slug2){
            $category = Category::where('slug',$slug)->first();
            $country = Country::where('abbreviation', $slug2)->first();
            $posts = Post::where(['category_id'=>$category->id, 'country'=>$country->id, 'status'=>1])->get();
            return view('post-list',compact('posts'));
        }
    }
}
