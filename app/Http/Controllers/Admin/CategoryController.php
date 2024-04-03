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
  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editCategory" data-url="'.url('admin/category/edit/'.$row->id).'"><i class="fa fa-edit" ></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" id="deleteCategory" data-url="'.url('admin/category/delete/'.$row->id).'"><i class="fa fa-trash-alt ml-3"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin.category.index');
    }

    public function store(Request $request)
    {
        Category::updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'title' => $request->category, 
                    'status' => '1'
                ]);        
     
        return response()->json(['success'=>'Category saved successfully.']);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return response()->json(['success'=>'Category deleted successfully.']);
    }
}
