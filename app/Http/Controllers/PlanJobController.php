<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PlanJobController extends Controller
{
    public function planJob(Request $request)
    {
        Artisan::call('Plan:cron');
        return "success";
    }
}
