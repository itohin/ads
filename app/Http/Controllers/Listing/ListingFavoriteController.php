<?php

namespace App\Http\Controllers\Listing;

use App\Listing;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingFavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request, Region $region, Listing $listing)
    {
        $request->user()->favoriteListings()->syncWithoutDetaching([$listing->id]);

        return back();
    }
}
