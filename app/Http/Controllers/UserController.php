<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
class UserController extends Controller
{
    public function partners(Request $request)
    {
        if ($request->ajax()) {
  
            $data = User::where('type',2)->orderBy('name')->get();  
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
        return view('admin.users.partner_edit')->with('partner',$partner);
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
            return redirect()->route('admin.partners')->with('success', 'Information Updated Successfully.');
        }else{
            return redirect()->route('admin.partners')->with('error', 'Error while updating information');
        }

    }
}
