<?php

namespace App\Http\Controllers\User;

use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    public function store(Region $region)
    {
        session()->put('region', $region->slug);

        return redirect()->back();
    }
}
