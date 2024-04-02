<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        return view('admin.category.index')->with($data);
    }
}
