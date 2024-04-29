<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PostJobsChangeStatusController extends Controller
{
    public function post_jobs_change_status(){
        Artisan::call('post:jobstatus');
        return "success";
    }
}
