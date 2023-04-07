<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\InvoiceRepositoryInterface;
use App\Interfaces\ShippingRepositoryInterface;
use App\Interfaces\OfferRepositoryInterface;

use App\Repositories\ProductRepository;
use App\Repositories\InvoiceRepository;
use App\Repositories\ShippingRepository;
use App\Repositories\OfferRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
        $this->app->bind(ShippingRepositoryInterface::class, ShippingRepository::class);
        $this->app->bind(OfferRepositoryInterface::class, OfferRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
