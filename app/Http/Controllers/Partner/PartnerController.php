<?php

namespace App\Http\Controllers\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

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
        $countries = Country::all();
        return view('partners.register',compact('countries'));
    }
    public function profile()
    {
        $data['user'] = User::where('id',auth()->user()->id)->with('country')->first();
        $data['countries'] = Country::all();
        return view('partners.profile.profile',compact('data'));
    }


    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/', 
            'key_services' => 'required',
            'country' => 'required',
            'company_profile' => 'required',
            'company_website' => 'required',
            'company_name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->key_services = $request->key_services;
        $user->company_name = $request->company_name;
        $user->certifications = $request->certifications;
        $user->company_website = $request->company_website;
        $user->company_profile = $request->company_profile;
        $user->country_id = $request->country;
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

    
    public function categories()
    {
        return view('partners.categories');
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
}