<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckPlanMail;


class CheckPlanExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:planExpiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */


public function handle()
{
    $users = User::pluck('email','plan_id');
    $plans = Plan::all();
    $notifications = [];

    foreach ($plans as $plan) {
        $expiryDate = $plan->created_at->addDays($plan->days);

        // Check if the plan will expire in 7 or 3 days
        if (Carbon::now()->addDays(7)->greaterThanOrEqualTo($expiryDate)) {
            $notifications[] = new CheckPlanMail($plan, 7);
        } elseif (Carbon::now()->addDays(3)->greaterThanOrEqualTo($expiryDate)) {
            $notifications[] = new CheckPlanMail($plan, 3);
        } elseif (Carbon::now()->greaterThanOrEqualTo($expiryDate)) {
            $notifications[] = new CheckPlanMail($plan, 0);
        }
    }

    // Send all notifications
    foreach ($notifications as $notification) {
        // Mail::to($users)->send($notification);
        Mail::to($users)->send($notification);

    }
}





}