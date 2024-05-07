<?php
use App\Models\Setting;
if (!function_exists('customHelper')) {
    function customHelper($parameter)
    {
        return Setting::select($parameter)->first();
    }
}


