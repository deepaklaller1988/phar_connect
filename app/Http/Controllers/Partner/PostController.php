<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Notification;
use Illuminate\Support\Facades\View;
use DataTables;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::where('partner_id',auth()->user()->id)->get();  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($model) {
                        // $status = $model->status == 1 ? '<label class="form-label label label-inverse-success">Approved</label>' : '<label class="form-label label label-inverse-danger">Inactive</label>';
                       if($model->status == 2){
                           $status = '<label class="form-label label label-inverse-danger">Rejected</label>';
                       }elseif($model->status == 1){
                           $status = '<label class="form-label label label-inverse-success">Approved</label>';
                       }else{
                           $status = '<label class="form-label label label-inverse-default">Waiting</label>';
                       }
                        return $status;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('/partner/post/edit/'.$row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editCategory" ><i class="fa fa-edit" ></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" data-url="'.url('partner/post/delete',$row->id).'" id="deletePost"><i class="fa fa-trash-alt ml-3"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
        }
        return view('partners.posts.index');
    }


    public function add()
    {
        $data['user'] = User::where('id',auth()->user()->id)->first();
        $categoryIdsString = $data['user']->category_ids;
        $categoryIdsArray = explode(',', $categoryIdsString);
        $data['categories'] = Category::whereIn('id', $categoryIdsArray)->get();
        return view('partners.posts.add')->with('data' , $data);
    }

    public function loadBlade(Request $request)
    {
        $data['categories'] = Category::where(['status'=>'1','parent_id'=>$request->id])->orderBy('title')->get();
        $data['user'] = User::where('id',auth()->user()->id)->first();
        $data['parent_id'] = $request->id;
        if($request->id == 1){
            $html = View::make('partners.posts.business-offering')->with('data',$data)->render();
        }elseif($request->id == 2){
            $html = View::make('partners.posts.consulting')->render();
        }elseif($request->id == 3){
            $html = View::make('partners.posts.events')->render();
        }elseif($request->id == 4){
            
        }elseif($request->id == 5){
            $html = View::make('partners.posts.jobs')->render();
        }else{

        }
        return response()->json(['html' => $html]);
    }

    public function store(request $request)
    {
    dd($request);
    //    $this->validate($request, [
    //        'title' => 'required',
    //        'description' => 'required', 
    //        'time' => 'required',
    //        'email' => 'required',
    //        'phone'  => 'required',
    //        'location' => 'required',
    //        'key_services' => 'required',
    //        'images' => 'required',
    //        'category_id' => 'required'
    //    ]);
       $post = new Post;
       $post->title = $request->title;
       $post->email = $request->email;
       $post->contact_info = $request->phone;
       $post->description = $request->description;
       $post->time = $request->time;
       $post->category_id = $request->category_id;
       $post->partner_id = auth()->user()->id;
       $post->key_services = $request->key_services;
       $images = []; 
        if ($request->hasFile('images')) {    
            foreach ($request->file('images') as $key => $image ) {
                $imageFilename = $key . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('uploads/posts', $imageFilename);
                $images[] =  $imageFilename;
                $post->images = implode(',',$images);
            }
        }
        if($post->save()){
            $notification = new Notification;
            $notification->user_id = auth()->user()->id;
            $notification->status = 0;
            $notification->notification = 'A new Post has been added By '.auth()->user()->name;
            $notification->type = "post";
            $notification->notification_for = $post->id;
            $notification->save();
            return redirect()->route('partner.posts')->with('success','Post Added Successfully');
        }else{
            return redirect()->route('partner.posts')->with('error','Something went wrong');
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $data['user'] = User::where('id',auth()->user()->id)->first();
        $categoryIdsString = $data['user']->category_ids;
        $categoryIdsArray = explode(',', $categoryIdsString);
        $data['categories'] = Category::whereIn('id', $categoryIdsArray)->get();
       
        return view('partners.posts.edit',compact('post','data'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->email = $request->email;
        $post->contact_info = $request->phone;
        $post->description = $request->description;
        $post->time = $request->time;
        $post->category_id = $request->category;
        $post->partner_id = auth()->user()->id;
        $post->key_services = $request->key_services;
        $images = []; 
        if ($request->hasFile('images')) {    
            foreach ($request->file('images') as $key => $image ) {
                $imageFilename = $key . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('uploads/posts', $imageFilename);
                $images[] =  $imageFilename;
                $post->images = $post->images.','. implode(',',$images);
            }
        }
        if($post->save()){
            
            $note = Notification::where('notification_for',$id)->first();
            if($note){
                $note->status = 0;
                $note->save();
            }else{
                $notification = new Notification;
                $notification->user_id = auth()->user()->id;
                $notification->status = 0;
                $notification->notification = 'An Post Updated By '.auth()->user()->name;
                $notification->type = "post";
                $notification->notification_for = $id;
                $notification->save();
            }
            return redirect()->route('partner.posts')->with('success','Post Updated Successfully');
        }else{
            return redirect()->route('partner.posts')->with('error','Something went wrong');
        }
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['success'=>'Post deleted successfully.']);
    }
}