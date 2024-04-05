<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index(){
        $plans = Plan::where('status',1)->get();
        return view('admin.plans.index')->with('plans',$plans);
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit')->with('plan',$plan);
    }

    public function add()
    {
        return view('admin.plans.add');
    }
}
