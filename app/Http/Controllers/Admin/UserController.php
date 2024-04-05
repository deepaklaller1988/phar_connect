<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function partners()
    {
        if ($request->ajax()) {
  
            $data = User::where('type',2)->orderBy('name')->get();  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
    }
}
