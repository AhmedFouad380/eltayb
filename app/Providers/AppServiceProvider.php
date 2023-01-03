<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

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
        // Artisan::call("migrate",['--force' => true]);
        $languages = ['ar', 'en'];
//        App::setLocale('ar');
        date_default_timezone_set('Asia/Kuwait');


        if (!session()->has('lang')) {
            session()->put('lang', 'en');
        }

    }
}
