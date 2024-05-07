<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.setting.index',compact('settings'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->youtube = $request->youtube;
        $setting->linkedin = $request->linkedin;
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('uploads', 'public');
            $setting->logo = $imagePath;
        }
        $setting->update();
        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully');
    }
}
 