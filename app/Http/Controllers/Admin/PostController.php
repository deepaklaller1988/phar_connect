<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Country;
use App\Models\Notification;
use DataTables;

class PostController extends Controller
{
    public function index(Request $request)
    {
     $category = Category::where(['parent_id'=> null])->orderBy('title','asc')->get();
        if ($request->ajax()) {
            if ($request->has('category_id') && $request->category_id != null) {
               $data = Post::where(['parent_id'=> $request->category_id])->with('user','parent_category')->orderBy('title','asc')->get();
            }else{
                $data = Post::latest()->with('user','parent_category')->get();
            }
             
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($model) {
                        if($model->status == 0){
                            $status = '<label class="form-label label label-inverse-warning">Waiting</label>';
                        }elseif($model->status == 1){
                            $status = '<label class="form-label label label-inverse-primary">Approved</label>';
                        }else{
                            $status = '<label class="form-label label label-inverse-danger">Rejected</label>';
                        }
                       return $status;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.route('admin.post.edit', $row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editCategory" ><i class="fa fa-eye" ></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" id="deletePost" data-url="'.route("admin.post.delete", $row->id).'"><i class="fa fa-trash-alt ml-3"></i></a>';
    
                            return $btn;
                    })
                    ->addColumn('partner', function($row){
   
                        $partner =  $row->user->name;
                         return $partner;
                    })
                    ->addColumn('parent_category', function($row){
   
                        $parent_category =  $row->parent_category->title;
                         return $parent_category;
                    })
                    ->rawColumns(['status','action','partner',])
                    ->make(true);
        }
        
        return view('admin.posts.index',compact('category'));
    }

    public function edit(Request $request, $id)
    {
        $post= Post::with('parent_category','category','zones')->find($id);
        if($post){
        $countries = Country::whereIn('id', explode(',',$post->country))->get();
        if($post->parent_id == 1){
            return view('admin.posts.edit.business-offering',compact('post','countries'));
        }elseif($post->parent_id == 2){
            return view('admin.posts.edit.consulting',compact('post','countries'));
        }elseif($post->parent_id == 3){
            return view('admin.posts.edit.events',compact('post','countries'));
        }elseif($post->parent_id == 4){
            return view('admin.posts.edit.authority',compact('post','countries'));
        }elseif($post->parent_id == 5){
            return view('admin.posts.edit.jobs',compact('post','countries'));
        }
    }else{
        return redirect()->route('admin.posts')->with('error', 'Something went wrong');
    }
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->status = $request->action;
        if($post->save()){
            $note = Notification::where('notification_for',$id)->first();
            if($note){
                if($request->action == 1){
                    $note->status = 1;
                    $note->notification = 'Post Approved';
                    $note->save();
                }elseif($request->action == 2){
                    $note->status = 2;
                    $note->notification = 'Post Rejected';
                    $note->save();
                }
            }
            return redirect()->route('admin.posts')->with('success', 'Post updated successfully');
        }else{
            return redirect()->route('admin.posts')->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['success'=>'Post deleted successfully.']);
    }

    public function category($id)   
    {
        $category = Category::where(['parent_id'=> $id])->orderBy('title','asc')->get();
        dd($category);
        return response()->json($category);
    }
}