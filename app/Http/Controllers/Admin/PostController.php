<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Notification;
use DataTables;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
  
            $data = Post::latest()->with('user','parent_category')->get();  
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
   
                           $btn = '<a href="'.route('admin.post.edit', $row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editCategory" ><i class="fa fa-edit" ></i></a>';
   
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
                    ->rawColumns(['status','action','partner','parent_category'])
                    ->make(true);
        }
        
        return view('admin.posts.index');
    }

    public function edit(Request $request, $id)
    {
        $post= Post::find($id);
        $data['user'] = User::where('id',$post->partner_id)->first();
        $categoryIdsString = $data['user']->category_ids;
        $categoryIdsArray = explode(',', $categoryIdsString);
        $data['categories'] = Category::whereIn('id', $categoryIdsArray)->get();
        $category = Category::find($post->category_id);
        $cat = array();
        if($category->parent_id != null){
            $cat['grandchildcategories'] = Category::where('parent_id',$category->parent_id)->get();
            $subcat = Category::where('id',$cat['grandchildcategories'][0]->id)->first();
            if($subcat){
                $cat['subcategories'] = Category::where('id',$subcat->parent_id)->get();
                if($cat['subcategories'][0]->parent_id != null){
                    $cat['childcategories'] = Category::where('parent_id',$cat['subcategories'][0]->parent_id)->get();
                }
            }
        }
        // dd($cat);
       
        return view('admin.posts.edit',compact('data','post','cat'));
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
}
