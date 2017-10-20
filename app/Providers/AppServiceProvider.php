<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Adding a new validator rule that compares numerical values to be greater than another
        Validator::extend('greater_than', function($attribute, $value, $params, $validator){
            $other = Input::get($params[0]);
            return intval($value) > intval($other);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
