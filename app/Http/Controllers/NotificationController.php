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
  
            $data = Notification::with('usernote')->orderBy('created_at','desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($model) {
                        $status = $model->status == 1 ? '<label class="form-label label label-inverse-success">Read</label>' : '<label class="form-label label label-inverse-danger">Unread</label>';
                        return $status;
                    })
                    ->addColumn('parent_name', function ($item) {
                        return $item->parent ? $item->parent->title : '';
                    })
                    ->rawColumns(['status','action','image','parent_name'])
                    ->make(true);
        }
        
        return view('admin.notifications.index');
    }

    public function get_partner_notifications(Request $request)
    {
        if ($request->ajax()) {
  
            $data = Notification::where('user_id',auth()->user()->id)->with('user')->orderBy('created_at','desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($model) {
                        $status = $model->status == 1 ? '<label class="form-label label label-inverse-success">Active</label>' : '<label class="form-label label label-inverse-danger">Inactive</label>';
                        return $status;
                    })
                    ->addColumn('parent_name', function ($item) {
                        return $item->parent ? $item->parent->title : '';
                    })
                    ->rawColumns(['status','action','image','parent_name'])
                    ->make(true);
        }
        
        return view('partner.notifications.index');
    }
}