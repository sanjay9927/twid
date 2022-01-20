<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use App\Support\CsvReader;

class CsvServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mylibrary',function($app){
            return new CsvReader;
        });
    }

    public function boot()
    {
       //
    }   
   
}
