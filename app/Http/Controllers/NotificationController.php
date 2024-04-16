<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

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
}
