<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
  
            $data = Category::orderBy('title')->get();
            // $data = Category::with('descendants')->whereNull('parent_id')->get();
  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($model) {
                        $status = $model->status == 1 ? '<label class="form-label label label-inverse-success">Active</label>' : '<label class="form-label label label-inverse-danger">Inactive</label>';
                        return $status;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin/category/edit/'.$row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editCategory" data-url="'.url('admin/category/edit/'.$row->id).'"><i class="fa fa-edit" ></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" id="deleteCategory" data-url="'.url('admin/category/delete/'.$row->id).'"><i class="fa fa-trash-alt ml-3"></i></a>';
    
                            return $btn;
                    })
                    ->addColumn('image', function ($model) {
                        $image = $model->status ? '<img src="'.url('storage/'.$model->image).'">' : '';
                        return $image;
                    })
                    ->rawColumns(['status','action','image'])
                    ->make(true);
        }
        
        return view('admin.category.index');
    }

    public function create()
    {
        $categories = Category::where('status','1')->get();
        return view('admin.category.add')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $check = Category::where('title',$request->name)->get()->toArray();
        if(!empty($check)){
            return redirect()->back()->with('error', 'Category already added..');
        }else{
            $request->validate([
                'name' => 'required',
                'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $category = new Category;
            $category->title = $request->name;
            $category->parent_id = $request->parent_id;
            $category->status = $request->status;
            if ($request->hasFile('category_image')) {
                $imagePath = $request->file('category_image')->store('uploads', 'public');
                $category->image = $imagePath;
            }
            if($category->save()){
                return redirect()->route('admin.categories')->with('success', 'New Category created successfully.');
            }else{
                return redirect()->route('admin.categories')->with('error', 'Error while creating new category');
            }
        }
    }

    public function edit($id)
    {
        $data['category'] = Category::find($id);
        $data['categories'] = Category::where('status','1')->get();
        return view('admin.category.edit')->with('data',$data);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request->name;
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        if ($request->hasFile('category_image')) {
            $imagePath = $request->file('category_image')->store('uploads', 'public');
            $category->image = $imagePath;
        }
        
        if($category->save()){
            return redirect()->route('admin.categories')->with('success', 'New Category created successfully.');
        }else{
            return redirect()->route('admin.categories')->with('error', 'Error while creating new category');
        }
    }
    public function destroy($id)
    {
        Category::find($id)->delete();
        return response()->json(['success'=>'Category deleted successfully.']);
    }
}
