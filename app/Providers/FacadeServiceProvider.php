<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facades\Discount;

class FacadeServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind('discount',function(){
            return new Discount();
        });
    }

}
