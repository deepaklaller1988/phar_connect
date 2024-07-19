<?php

namespace App\Http\Controllers\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Position;
use App\Models\Plan;

class PartnerController extends Controller
{
    public function dashboard()
    {
        $posts = Post::where('partner_id',auth()->user()->id)->count();
        $countss = Post::withCount('views')->where('partner_id',auth()->user()->id)->get();
        $active = Post::where('partner_id',auth()->user()->id)->where('status',1)->count();
        $archive = Post::where('partner_id',auth()->user()->id)->where('status',2)->count();
        $count = 0;
        foreach ($countss as $counts) {
            $count += $counts->views_count;
        }
        return view('partners.dashboard',compact('posts','count','active','archive'));
    }

    public function register()
    {
        // Retrieve all countries
        $countries = Country::all();

        // Retrieve categories matching the title and with no parent
        $categories = Category::where('title', '!=', 'Health Authority Sites')
                            ->whereNull('parent_id')
                            ->orderBy('title')
                            ->get();

        // Pass both countries and categories to the view
        $data = [
            'countries' => $countries,
            'categories' => $categories,
        ];

        // Return the view 'partners.register' and pass the data variable to it
        return view('partners.register', $data);
    }
    public function profile()
    {
        $data['user'] = User::where('id',auth()->user()->id)->with('country')->first();
        $data['countries'] = Country::all();
        return view('partners.profile.profile',compact('data'));
    }


    public function update(Request $request,$id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'phone' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/', 
        //     'company_name' => 'required',
        //     'alternate_phone_number' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
        //     'alternate_contact_name' => 'required',
        //     'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
      
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->company_name = $request->company_name;
        $user->alternate_contact_name = $request->alternate_contact_name;
        $user->alternate_phone_number = $request->alternate_phone_number;
        $user->company_profile = $request->company_profile;
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('uploads/partners/logo', 'public');
            $user->logo = $imagePath;
        }
        if ($request->hasFile('banner')) {
            $imagePath = $request->file('banner')->store('uploads/partners/banner', 'public');
            $user->banner = $imagePath;
        }
        if($user->save()){
            return redirect()->route('partner.profile')->with('success', 'Information Updated Successfully.');
        }else{
            return redirect()->route('partner.profile')->with('error', 'Error while updating information');
        }

    }

    public function complete_profile(Request $request,$id)
    {
        $this->validate($request, [
            'certifications' => 'required',
            'category_ids' => 'required',
            'company_profile'=>'required',
            'company_website'=>'required'
        ]);
        $user = User::findOrFail($id);
        $user->certifications = $request->certifications;
        $user->category_ids = implode(',', $request->category_ids);
        $user->company_profile = $request->company_profile;
        $user->company_website = $request->company_website;
        $user->linkedin_profile = $request->linkedin_profile;
        $user->twiter_profile = $request->twiter_profile;
        $user->country_id = implode(',', $request->country_id);
        $user->representatives = $request->representatives;
        $user->location = $request->location;
        $user->agenda = $request->agenda;
        $user->end_date = $request->end_date;
        $user->start_date = $request->start_date;
        $user->event_name = $request->event_name;
        $user->industry = $request->industry;
        $user->position_type = $request->position_type;
        $user->position_title = $request->position_title;
        $user->education_level = $request->education_level;
        $user->experience_level = $request->experience_level;
        if($user->save()){
            return redirect()->route('partner.dashboard')->with('success', 'Information Updated Successfully.');
        }else{
            return redirect()->route('partner.dashboard')->with('error', 'Error while updating information');
        }
    }

    
    public function categories()
    {
        $categories = Category::where('parent_id',NULL)->where('id','!=',4)->orderBy('title')->get();
        return view('partners.categories',compact('categories'));
    }
    public function selected_categories(Request $request)
    {
       $categories = $request['data'];
       $category = implode(',',$categories);
       $user = User::where('id',auth()->user()->id)->first();
       $user->category_ids = $category;
       $user->save();
       return response()->json('success',200);
    } 
    
    public function registerAddBlade(Request $request)
    {

        $data['subcategories'] = Category::where('parent_id',$request->category_id)->orderBy('title')->get();
        foreach($data['subcategories'] as $key => $value) {
            $data[$key]['childcategory'] = Category::where('parent_id',$value->id)->orderBy('title')->get();
            foreach($data[$key]['childcategory'] as $k => $v) {
                $data[$key][$k]['grandchildcategory'] = Category::where('parent_id',$v->id)->orderBy('title')->get();
            }
        }
        $data['countries'] = Country::all();
        $data['parent_id'] = $request->category_id;
        $data['plans']  = Plan::where('id',auth()->user()->plan_id)->first();
        if($request->category_id == 1) {
            $html = View::make('partners.partnerRegister.register-business-offering')->with('data',$data)->render();
        } elseif($request->category_id == 2) {
            $html = View::make('partners.partnerRegister.register-consulting')->with('data',$data)->render();
        } elseif($request->category_id == 3) {
            $html = View::make('partners.partnerRegister.register-events')->with('data',$data)->render();
        } elseif($request->category_id == 5) {
            $data['educations'] = Education::all();
            $data['positions'] = Position::all();
            $data['experiences'] = Experience::all();
            $html = View::make('partners.partnerRegister.register-jobs')->with('data',$data)->render();
        } else {
            // Handle other cases if needed
        }
 
        return response()->json(['html' => $html]);
    }


}