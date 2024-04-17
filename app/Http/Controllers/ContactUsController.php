<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\ContactUs;
use App\Mail\ContactUsEmail; 
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function contactus()
    {
        $contactus = Page::get('contact_info');
        return view('contactus')->with('contactus',$contactus);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required',
            'email'     => 'required|email|unique:contact_us',
            'phone'     => 'required|digits:10',
            'messages'  => 'required'
        ],
        [
            'full_name.required' => 'The name field is required',
            'messages.required'  => 'The desciption field is required'
        ]);

        // Save data to the database
        $contact = ContactUs::create($data);

        // Send email notification
        Mail::to('siddtyagi@gmail.com')->send(new ContactUsEmail($contact));

        return redirect()->route('contact-us')->with('success', 'Contact data created successfully.');
    }
}

