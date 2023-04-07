<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\InvoiceBuilderInterface;
use App\Builders\ProductInvoiceBuilder;

class BuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind( InvoiceBuilderInterface::class , ProductInvoiceBuilder::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
