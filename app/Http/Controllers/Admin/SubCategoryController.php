<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\SubCategory;
use App\Models\Category;
class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subcategories = SubCategory::orderBy('title')->with('category')->get();
            return DataTables::of($subcategories)
                ->addIndexColumn()
                ->addColumn('category_name', function ($subcategory) {
                    return $subcategory->category->title;
                })
                ->addColumn('action', function($row){
    
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" id="editSubCategory" data-caturl="'.url('/admin/allcategories').'" data-url="'.url('admin/subcategory/edit/'.$row->id).'"><i class="fa fa-edit" ></i></a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" id="deleteSubCategory" data-url="'.url('admin/subcategory/delete/'.$row->id).'"><i class="fa fa-trash-alt ml-3"></i></a>';

                    return $btn;
                })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.subcategory.index');
    }

    public function store(Request $request)
    {
        SubCategory::updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'title' => $request->subcategory, 
                    'category_id' => $request->category,
                    'description' => $request->description
                ]);        
     
        return response()->json(['success'=>'Sub Category saved successfully.']);
    }

    public function get_categories()
    {
        $categories = Category::orderBy('title')->get();
        return response()->json($categories);
    }

    public function edit($id)
    {
        $category = SubCategory::find($id);
        return response()->json($category);
    }

    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        return response()->json(['success'=>'Category deleted successfully.']);
    }

}
