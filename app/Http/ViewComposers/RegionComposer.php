<?php

namespace App\Http\ViewComposers;

use App\Region;
use Illuminate\View\View;

class RegionComposer
{
    private $region;

    public function compose(View $view)
    {
        if (!$this->region) {
            $this->region = Region::where('slug', session()->get('region', config()->get('ads.defaults.region')))->first();
        }

        return $view->with('region', $this->region);
    }
}