<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\User;
use App\Models\Transaction;
class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function dashboard()
    {
        $data['visitors'] = Visitor::count();
        $data['partners'] = User::where(['type'=>2,'status'=>1])->where('plan_id','!=',0)->count();
        $data['monthly_revenue'] = Transaction::whereMonth('created_at',date('m'))->sum('amount');
        $data['yearly_revenue'] = Transaction::whereYear('created_at',date('Y'))->sum('amount');
        $data['active'] = User::where(['status'=> 1,'type' => 2])->count();
        $data['inactive'] = User::where(['status'=> 0,'type' => 2])->count();
        $months = [1,2,3,4,5,6,7,8,9,10,11,12];
        $users =[];
        foreach($months as $key => $month){
            $users[$key] = [$month,User::whereMonth('created_at', $month)->count()];
        }
        $data['users'] = $users;
        return view('admin.dashboard',compact('data'));
    }

    public function update_password(Request $request)
    {

        $user = auth()->user();
        if (\Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => \Hash::make($request->new_password)
            ]);
            return response()->json(['message' => 'Password updated successfully','status' => true]);
        } else {
            return response()->json(['message' => 'Old Password does not match','status' => false]);
        }
    }
}