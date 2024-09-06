<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Notification;
class HeaderServiceProvider extends ServiceProvider
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
            $data['maincategories'] = Category::where(['parent_id'=> NULL, 'status'=>1 ])->get(); // Fetch your global data here
            foreach($data['maincategories'] as $key => $allcategory){
                $data[$key]['childcategories'] = Category::where(['parent_id' =>$allcategory->id, 'status'=>1])->get();
                foreach($data[$key]['childcategories']  as $skey => $childcategory){
                    $data[$key][$skey]['subcategories'] = Category::where(['parent_id' =>$childcategory->id, 'status'=>1])->get();
                }
            }

            if(isset(auth()->user()->id) && auth()->user()->id){
                $allnotifications = Notification::where(['user_id'=> auth()->user()->id,'read'=> 0,'status'=>0])->orderBy('id','asc')->get(); 
                $adminnotifications = Notification::where([ 'status'=>0])->orderBy('id','desc')->get(); 
            }else{
                $allnotifications = [];
                $adminnotifications = [];
            }

            $view->with(['allcategories' => $data,'allnotifications' => $allnotifications,'adminnotifications' => $adminnotifications ]);
        });
    } 
}
