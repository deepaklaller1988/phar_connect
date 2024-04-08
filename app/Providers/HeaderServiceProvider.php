<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
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
            $data['maincategories'] = Category::where('parent_id',NULL)->get(); // Fetch your global data here
            foreach($data['maincategories'] as $key => $allcategory){
                $data[$key]['childcategories'] = Category::where('parent_id',$allcategory->id)->get();
            }
            $view->with('allcategories', $data );
        });
    }
}
