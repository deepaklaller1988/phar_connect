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
use App\Models\PostView;
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
        $data['parent'] = $slug;
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
        $countries = Country::all();
        if($parent){
            $hparent = Category::where('id', $parent->parent_id)->first();
            if($hparent){
                $hhparent = Category::where('id', $hparent->parent_id)->first();
            }
        }
        if($hhparent){
            $prnt = $hhparent->id;
            $cat = $hhparent->title;
        }elseif($hparent){
            $prnt = $hparent->id;
            $cat = $hparent->title;
        }else{
            $prnt = $parent->id;
            $cat = $parent->title;
        }
        if($parent->parent_id != NULL){
            $datas['maincategories'] = Category::where('parent_id',$prnt)->get();
        }
        foreach($datas['maincategories'] as $key=> $mcategory){
            $datas[$key]['subcategories'] = Category::where('parent_id',$mcategory->id)->get();
            foreach($datas[$key]['subcategories'] as $skey => $scategory){
                $datas[$key][$skey]['childcategory'] = Category::where('parent_id',$scategory->id)->get();
            }
        }
       
        $data['categories'] = Category::where(['parent_id'=> $parent->id,'status'=> 1 ])->orderBy('title','asc')->get();
        if(count($data['categories']) > 0){
            return view('subcategory')->with(['data'=> $data,'categories'=>$datas,'prnt'=>$prnt ,'cat' => $cat ,'countries' => $countries]);
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

   

    public function partner_details($slug)
    {
        $slug = str_replace('-',' ',$slug);
        $partner = User::where('name',$slug)->with('country')->first();
        return view('partner-details',compact('partner'));
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
            $posts = Post::with('user','countrie','experience','education','position')->where(['category_id'=>$getcat->id, 'status'=>1])->get();
            return view('jobs',compact('posts'));
        }else{
            $posts = Post::with('user')->where(['category_id'=>$getcat->id, 'status'=>1])->get();
            $category = Category::where('id', $posts[0]->parent_id)->first();
            return view('post-list',compact('posts','category','getcat'));
        }
    }

    public function post_details(Request $request,$slug)
    {
        $post = Post::with('user')->where('slug',$slug)->first();
        $countries = $post->country;
        $countries = explode(',', $countries);
        $countries = Country::whereIn('id', $countries)->pluck('country_name')->toArray();
        $post->country_name = implode(',', $countries);
        $views = new PostView();
        $views->post_id = $post->id;
        $views->ip_address = request()->ip();
        $viewss = Postview::where(['post_id' => $post->id, 'ip_address' => request()->ip()])->first();
        if(!$viewss){
            $views->save();
        } 
        $post->post_views = PostView::where('post_id', $post->id)->count();
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
        if($slug2 == ""){
            $category = Category::where('slug',$slug)->first();
            if($category){
                $posts = Post::where(['category_id'=>$category->id, 'status'=>1])->get();
                $country = null;
            }else{
                $country = Country::where('abbreviation', $slug)->first();
                $posts = Post::where(['country'=>$country->id, 'status'=>1])->get();
            }
            return view('search-post-list',compact('posts','country','category'));
        }else{
            $category = Category::where('slug',$slug)->first();
            $country = Country::where('abbreviation', $slug2)->first();
            $posts = Post::where(['category_id'=>$category->id, 'country'=>$country->id, 'status'=>1])->get();
            return view('search-post-list',compact('posts','category','country'));
        }

    }
 
    public function getpost(Request $request,$id)
    {
        $post = Post::where(['id'=>$id, 'status'=>1])->with('user','countrie','experience','education','position')->first();
        return response()->json($post);
    }

       
}
