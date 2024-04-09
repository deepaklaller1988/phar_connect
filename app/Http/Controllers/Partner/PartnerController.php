<?php

namespace App\Http\Controllers\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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


    public function update(Request $request,$id)
    {

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->key_services = $request->key_services;
        $user->certifications = $request->certifications;
        $user->company_website = $request->company_website;
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

    public function city_suggestion(Request $request)
    {
        if(isset($request->term)){
            $url = 'https://api.teleport.org/api/cities/?search=' . urlencode($_GET['term']);
            $response = file_get_contents($url);
            dd($response);
            if($response !== false){
                echo $response;
            } else {
                http_response_code(500);
                echo json_encode(array("error" => "Failed to fetch data from the server."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("error" => "Search term is required."));
        }
    }
}