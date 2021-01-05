<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

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
        Inertia::share([
                'error' => function() {
                    if($error = Session::get('errors')){
                        return $error->getBag('default');
                    }
                    else return false;
                },
                'success' => function() {
                    if(Session::get('success')) {
                        return Session::get('success');
                    }
                    else return false;
                }
        ]);
    }
}
