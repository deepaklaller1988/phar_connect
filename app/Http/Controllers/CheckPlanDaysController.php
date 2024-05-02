<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CheckPlanDaysController extends Controller
{
    public function check_plan_days(){
         Artisan::call('check:planExpiration');
        return "plan expire";
    }
}
