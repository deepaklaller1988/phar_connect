<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class PlanCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Plan:cron';

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


        $users = User::all();

        foreach ($users as $user) {
            if ($user->isPlanExpired()) {
                $user->update(['plan_status' => 'expired']);
            }
        }

        $this->info('User plans checked and updated.');
    }
}
