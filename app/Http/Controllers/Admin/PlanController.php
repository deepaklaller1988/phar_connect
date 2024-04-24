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

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',
            'days' => 'required|numeric',
        ]);
        $plan = new Plan(); 
        $plan->title = $request->title;   
        $plan->description = $request->description;
        $plan->amount= $request->amount; 
        $plan->status = $request->status;
        $plan->days = $request->days;
        if($plan->save()){
            return redirect()->route('admin.plans')->with('success','Plan Added Successfully');
        }
        else{
            return redirect()->route('admin.plans')->with('error','Something went wrong');
        }
    }

    public function update(Request $request, $id)  
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',
            'days' => 'required|numeric',
        ]);
        $plan = Plan::findOrFail($id);
        $plan->title = $request->title;   
        $plan->description = $request->description;
        $plan->amount= $request->amount; 
        $plan->status = $request->status;
        $plan->days = $request->days;
        if($plan->save()){
            return redirect()->route('admin.plans')->with('success','Plan Updated Successfully');
        }
        else{
            return redirect()->route('admin.plans')->with('error','Something went wrong');
        }
    }
    public function delete($id)
    {
        $record = Plan::findOrFail($id);
        $record->delete();
        return response()->json(['success' => true]);
    }
}
