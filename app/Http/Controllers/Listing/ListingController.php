<?php

namespace App\Http\Controllers\Listing;

use App\Category;
use App\Jobs\UserViewedListing;
use App\Listing;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index(Region $region, Category $category)
    {
        $listings = Listing::with(['user', 'region'])->isLive()->inRegion($region)->fromCategory($category)->latestFirst()->paginate(10);

        return view('listings.index', compact('listings', 'category'));
    }

    public function show(Request $request, Region $region, Listing $listing)
    {
        if (!$listing->live()) {
            abort(404);
        }

        if ($request->user()) {
            dispatch(new UserViewedListing($request->user(), $listing));
        }

        return view('listings.show', compact('listing'));
    }
}
