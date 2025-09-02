<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Observers\productObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
     public function boot() {
        $categories = Category::all();
        view()->share('cats', $categories);

        Product::observe(ProductObserver::class);
    }
}
