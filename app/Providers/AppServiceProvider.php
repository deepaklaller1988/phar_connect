<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('partials.footer', function ($view) {
            $categories = Category::where('parent_id',NULL)->get();
            $view->with('categories', $categories);
        });

        Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret'   => '6Ldq9M4pAAAAAE_d119Jol89c_fU150uGwUxCg5U',
                    'response' => $value,
                ],
            ]);
    
            $body = json_decode((string) $response->getBody());
            return $body->success;
        });
    }
}
