<?php

namespace App\Providers;

use App\Region;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use App\Category;

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
        Region::creating(function ($region) {
            $prefix = $region->parent ? $region->parent->name . ' ' : '';
            $region->slug = Str::slug($prefix . $region->name);
        });

        Category::creating(function ($category) {
            $prefix = $category->parent ? $category->parent->name . ' ' : '';
            $category->slug = Str::slug($prefix . $category->name);
        });
    }
}
