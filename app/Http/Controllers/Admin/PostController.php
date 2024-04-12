<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use DataTables;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
  
            $data = Post::latest()->with('user')->get();  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($model) {
                        if($model->status == 0){
                            $status = '<label class="form-label label label-inverse-info">Waiting</label>';
                        }elseif($model->status == 2){
                            $status = '<label class="form-label label label-inverse-primary">Approved</label>';
                        }else{
                            $status = '<label class="form-label label label-inverse-danger">Rejected</label>';
                        }
                       return $status;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="#" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editCategory" ><i class="fa fa-edit" ></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" id="deleteCategory" data-url="#"><i class="fa fa-trash-alt ml-3"></i></a>';
    
                            return $btn;
                    })
                    ->addColumn('partner', function($row){
   
                        $partner =  $row->user->name;
                         return $partner;
                 })
                    ->rawColumns(['status','action','partner'])
                    ->make(true);
        }
        
        return view('admin.posts.index');
    }
}
