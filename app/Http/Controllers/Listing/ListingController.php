<?php

namespace App\Http\Controllers\Listing;

use App\Category;
use App\Listing;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index(Region $region, Category $category)
    {
        $listings = Listing::with(['user', 'region'])->isLive()->inRegion($region)->fromCategory($category)->latestFirst()->paginate(1);

        return view('listings.index', compact('listings', 'category'));
    }
}
