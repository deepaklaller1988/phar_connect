<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon\Carbon;

class PostJobsStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:jobstatus';

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
    $posts = Post::where(function($query) {
                    $query->where('created_at', '<=', Carbon::now()->subDays(7))
                          ->orWhere('status', '!=', 'expired');
                })
                ->orWhere('parent_id', 5)
                ->get();

                foreach ($posts as $post) {
                    if ($post->created_at <= Carbon::now()->subDays(7) && $post->status != 'expired' && $post->parent_id == 5) {
                        $post->status = 'expired';
                        $post->save();
                    }
                }
                

    $this->info('Expired posts updated successfully.');
}

    

}
