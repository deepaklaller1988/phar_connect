<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Category;
class PlanController extends Controller
{
    public function index(){
        $plans = Plan::where(['status'=>1, 'category_id'=>1])->get();
        $plans1 = Plan::where(['status'=>1, 'category_id'=>3])->get();
        $plans2 = Plan::where(['status'=>1, 'category_id'=>5])->get();
        return view('admin.plans.index',compact('plans','plans1','plans2'));
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        $categories = Category::where('status', 1)->where('parent_id', NULL)->where('id','!=',4)->get();
        return view('admin.plans.edit')->with(['categories' => $categories,'plan'=>$plan]);
    }

    public function add()
    {
        $categories = Category::where('status', 1)->where('parent_id', NULL)->where('id','!=',4)->get();
        return view('admin.plans.add',compact('categories'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',
            'days' => 'required|numeric',
            'number_of_country' => 'required',
            'number_of_category' => 'required'
        ]);
        $plan = new Plan(); 
        $plan->title = $request->title;   
        $plan->description = $request->description;
        if($request->category_id == 2){
            $plan->category_id = 1;
        }else{
            $plan->category_id = $request->category_id;
        }
        $plan->amount= $request->amount; 
        $plan->status = $request->status;
        $plan->days = $request->days;
        $plan->number_of_country = $request->number_of_country;
        $plan->number_of_category = $request->number_of_category;
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
            'number_of_country' => 'required',
            'number_of_category' => 'required'
        ]);
        $plan = Plan::findOrFail($id);
        $plan->title = $request->title;   
        $plan->description = $request->description;
        $plan->amount= $request->amount; 
        if($request->category_id == 2){
            $plan->category_id = 1;
        }else{
            $plan->category_id = $request->category_id;
        }
        $plan->status = $request->status;
        $plan->days = $request->days;
        $plan->number_of_country = $request->number_of_country;
        $plan->number_of_category = $request->number_of_category;
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
