<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Plan;
use App\Models\Category;
use Carbon\Carbon;
use DataTables;
use PDF;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::latest()->with('usernote','plan')->get();
            foreach($data as $key => $dt){
                $categories[$key]= Category::whereIn('id',explode(',',$dt->category_id))->get('title');
            }
            foreach($categories as $key=> $cat){
                $catt[$key] = implode(',',$cat->pluck('title')->toArray()); 
            }
            foreach($data as $key => $dt){
                $data[$key]['categories'] = $catt[$key];
            }
          
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if($row->status === "success"){
                        $status = '<span class="badge badge-success">Paid</span>';
                    }else{
                        $status = '<span class="badge badge-danger">Unpaid</span>';
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $btn = '<a target="_blank" href="'.url('/admin/view-invoice',$row->id).'"><i class="fa fa-download"></i></a>';  
                    return $btn;
                })
                ->addColumn('categories', function($row){
                    $categories = $row->categories;
                    return $categories;
                })
                ->addColumn('title', function($row){
                    return $row->usernote->name;   
                })
                ->addColumn('plan', function($row){
                    return $row->plan->title;   
                })
                ->addColumn('expiry_date', function($row){
                    $days = $row->plan->days;
                    $date1 = $row->created_at;
                    $date = $date1->addDays($days);
                    return date('Y-m-d',strtotime($date));
                })
                ->rawColumns(['status','action','categories','title','plan'])
                ->make(true);
        }
        return view('admin.transactions.index');
    }

    public function download_invoice(Request $request, $id)
    {
        $id = $request->id;
        $transaction = Transaction::find($id);
        $user = User::find($transaction->user_id);
        $plan = Plan::find($transaction->plan_id);
        $categories1 = Category::whereIn('id',explode(',', $transaction->category_id))->get('title');
        $categories = implode(',', $categories1->pluck('title')->toArray());
        return view('admin.transactions.invoice', compact('transaction','user','plan','categories'));
    }
}
