<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Mail\RegistrationMail;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\Plan;
use Carbon\Carbon;
use DataTables;
class UserController extends Controller
{
    public function partners(Request $request)
    {
        if ($request->ajax()) {
  
            $data = User::where(['type'=> 2])->where('plan_status','!=', NULL)->orderBy('id','desc')->get();  
            return Datatables::of($data)
                    ->addColumn('checkbox', function ($item) {
                        return '<input type="checkbox" value="'.$item->id.'" name="someCheckbox" />';
                      })
                    ->addColumn('created_at', function($row){
                        return Carbon::parse($row->created_at)->format('d-m-Y');   
                    })
                    ->addColumn('is_featured', function($row){
                        if($row->is_featured == 1){
                           $featured = "Yes"; 
                        }else{
                            $featured = "No";
                        }
                        return $featured;
                    })
                    ->addColumn('status', function($row){
                        if($row->status == 0){
                           $status = "Inactive"; 
                        }else{
                            $status = "Active";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin/partner/edit',$row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editPartner" ><i class="fa fa-edit" ></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" id="deleteCategory" ><i class="fa fa-trash-alt ml-3"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['checkbox','action','is_featured','status'])
                    ->make(true);
        }
        return view('admin.users.partners');
    }

    public function members(Request $request)
    {
        if ($request->ajax()) {
  
            $data = User::where('type',0)->orderBy('name')->get();  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="#" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editCategory" ><i class="fa fa-edit" ></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" id="deleteCategory" ><i class="fa fa-trash-alt ml-3"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.users.members');
    }

    public function edit_partner(Request $request, $id)
    {
        $partner = User::findOrfail($id);
        $countries = Country::all();
        return view('admin.users.partner_edit')->with(['partner'=> $partner,'countries' => $countries]);
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->company_name = $request->company_name;
        $user->phone = $request->phone;
        $user->key_services = $request->key_services;
        $user->certifications = $request->certifications;
        $user->company_website = $request->company_website;
        $user->company_profile = $request->company_profile;
        $user->country_id = $request->country_id;
        $user->status = $request->status;
        $user->is_featured = $request->is_featured;
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('uploads/partners/logo', 'public');
            $user->logo = $imagePath;
        }
        if ($request->hasFile('banner')) {
            $imagePath = $request->file('banner')->store('uploads/partners/banner', 'public');
            $user->banner = $imagePath;
        }
        if($user->save()){
            $note = Notification::where('user_id',$id)->first();
            if($note){
                if($request->status == 1){
                    $note->status = 1;
                    $note->notification = 'Your Account is approved';
                    $note->save();
                }elseif($request->status == 2){
                    $note->status = 2;
                    $note->notification = 'Account declined by admin';
                    $note->save();
                }
            }
            return redirect()->route('admin.partners')->with('success', 'Information Updated Successfully.');
        }else{
            return redirect()->route('admin.partners')->with('error', 'Error while updating information');
        }

    }

    public function add_partner(Request $request)
    {
        $countries = Country::all();
        return view('admin.users.partner_add',compact('countries'));
    }

    public function store_partner(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|unique:users,email',
            'key_services' => 'required',
            'certifications' => 'required',
            'company_website' => 'required',
            'company_profile' => 'required',
            'country_id' => 'required',
            'company_name' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company_name = $request->company_name;
        $user->password = Hash::make($request->password);
        $user->key_services = $request->key_services;
        $user->certifications = $request->certifications;
        $user->company_website = $request->company_website;
        $user->company_profile = $request->company_profile;
        $user->status = $request->status;
        $user->country_id = $request->country_id;
        $user->type = 2;
        $user->created_by = auth()->user()->id;
        $user->is_featured = $request->is_featured;

        $data = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('uploads/partners/logo', 'public');
            $user->logo = $imagePath;
        }
        if ($request->hasFile('banner')) {
            $imagePath = $request->file('banner')->store('uploads/partners/banner', 'public');
            $user->banner = $imagePath;
        }
        if($user->save()){
            Mail::to($request->email)->send(new RegistrationMail($data));
            return redirect()->route('admin.partners')->with('success', 'Partner Added Successfully.');
        }else{  
            return redirect()->route('admin.partners')->with('error', 'Error while adding partner');
        }
    }

    public function partners_by_admin(Request $request)
    {
        if ($request->ajax()) {
  
            $data = User::where(['type'=> 2,'created_by' => 1,'plan_status' => 'active'])->orderBy('id','desc')->get();  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('is_featured', function($row){
                        if($row->is_featured == 1){
                           $featured = "Yes"; 
                        }else{
                            $featured = "No";
                        }
                        return $featured;
                    })
                    ->addColumn('status', function($row){
                        if($row->status == 0){
                           $status = "Inactive"; 
                        }else{
                            $status = "Active";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin/partner/edit',$row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editPartner" ><i class="fa fa-edit" ></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" id="deleteCategory" ><i class="fa fa-trash-alt ml-3"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action','is_featured','status'])
                    ->make(true);
        }
        return view('admin.users.partners_by_admin');
    }

    public function bulkaction(Request $request)
    {
        $ids = $request->ids;
        $user =  User::whereIn('id',explode(",",$ids))->update(['status' => $request->status]);
        if($user){
            return redirect()->route('admin.partners')->with('success', 'Partner Added Successfully.');
        }else{  
            return redirect()->route('admin.partners')->with('error', 'Error while adding partner');
        }
    }

    public function archive_partners(Request $request)
    {
        if ($request->ajax()) {
  
            $data = User::where(['type' => 2, 'plan_status' => 'expired'])->orderBy('id','desc')->get();  
            return Datatables::of($data)
                    ->addColumn('checkbox', function ($item) {
                        return '<input type="checkbox" value="'.$item->id.'" name="someCheckbox" />';
                      })
                    ->addColumn('created_at', function($row){
                        return Carbon::parse($row->created_at)->format('d-m-Y');   
                    })
                    ->addColumn('is_featured', function($row){
                        if($row->is_featured == 1){
                           $featured = "Yes"; 
                        }else{
                            $featured = "No";
                        }
                        return $featured;
                    })
                    ->addColumn('status', function($row){
                        if($row->status == 0){
                           $status = "Inactive"; 
                        }else{
                            $status = "Active";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin/partner/edit',$row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editPartner" ><i class="fa fa-edit" ></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" id="deleteCategory" ><i class="fa fa-trash-alt ml-3"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['checkbox','action','is_featured','status'])
                    ->make(true);
        }
        return view('admin.users.archive-partners');
        
    }
   
}

        
