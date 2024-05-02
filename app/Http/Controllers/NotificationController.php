<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use DataTables;
class NotificationController extends Controller
{
    public function update(Request $request, $id)
    {
        $record = Notification::find($id);
        $record->read = 1;
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->save();
        return response()->json(['success' => 'Record updated successfully']);
    }

    public function get_admin_notifications(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('type_select') && $request->type_select != null) {
                $data = Notification::where(['type'=> $request->type_select])->with('usernote')->orderBy('created_at','desc')->get();
             }else{
                $data = Notification::with('usernote')->orderBy('created_at','desc')->get();
             }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($model) {
                        $status = $model->status == 1 ? '<label class="form-label label label-inverse-success">Read</label>' : '<label class="form-label label label-inverse-danger">Unread</label>';
                        return $status;
                    })
                    ->addColumn('parent_name', function ($item) {
                        return $item->usernote ? $item->usernote->name : '';
                    })
                    ->addColumn('action', function($row){
                        if($row->type=="post"){
                            return '<a href="'.route("admin.post.edit", $row->notification_for).'" class="btn btn-sm btn-primary">View</a>';
                        }elseif($row->type=="user"){
                            return '<a href="'.route("admin.partner.edit", $row->user_id).'" class="btn btn-sm btn-primary">View</a>';       
                        }
                    })
                    ->rawColumns(['status','parent_name','action'])
                    ->make(true);
        }
        
        return view('admin.notifications.index');
    }

    public function get_partner_notifications(Request $request)
    {
        if ($request->ajax()) {
            $data = Notification::where('user_id',auth()->user()->id)->with('usernote')->orderBy('created_at','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($model) {
                    $status = $model->status == 1 ? '<label class="form-label label label-inverse-success">Read</label>' : '<label class="form-label label label-inverse-danger">Unread</label>';
                    return $status;
                })
                ->addColumn('parent_name', function ($item) {
                    return $item->usernote ? $item->usernote->name : '';
                })
                ->rawColumns(['status','parent_name'])
                ->make(true);
        } 
        
        return view('partners.notifications.index');
    }
}