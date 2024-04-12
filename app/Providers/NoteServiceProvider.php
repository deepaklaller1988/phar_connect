<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\models\Notification;

class NoteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if(auth()->user()){
            $data = Notification::where(['user_id'=>auth()->user()->id, 'status'=>0])->get();   
            $view->with('allnotifications', $data );
            }
        });
    }
}
