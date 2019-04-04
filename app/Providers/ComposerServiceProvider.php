<?php

namespace App\Providers;

use App\Category;
use App\Region;
use App\Http\ViewComposers\RegionComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RegionComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', RegionComposer::class);

        View::composer(['listings.partials.forms.regions', 'listings.partials.forms.categories'], function ($view) {
            $categories = Category::get()->toTree();
            $regions = Region::get()->toTree();

            $view->with(compact('categories', 'regions'));
        });
    }
}
