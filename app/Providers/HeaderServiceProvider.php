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
            $data['maincategories'] = Category::where(['parent_id'=> NULL, 'status'=>1 ])->get(); // Fetch your global data here
            foreach($data['maincategories'] as $key => $allcategory){
                $data[$key]['childcategories'] = Category::where(['parent_id' =>$allcategory->id, 'status'=>1])->get();
                foreach($data[$key]['childcategories']  as $skey => $childcategory){
                    $data[$key][$skey]['subcategories'] = Category::where(['parent_id' =>$childcategory->id, 'status'=>1])->get();
                }
            }

            $view->with('allcategories', $data );
        });
    }
}
