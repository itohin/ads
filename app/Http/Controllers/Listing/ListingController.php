<?php

namespace App\Http\Controllers\Listing;

use App\Category;
use App\Http\Requests\StoreListingFormRequest;
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

    public function create()
    {
        return view('listings.create');
    }

    public function store(StoreListingFormRequest $request, Region $region)
    {
        $listing = new Listing;

        $listing->title = $request->title;
        $listing->body = $request->body;
        $listing->category_id = $request->category_id;
        $listing->region_id = $request->region_id;
        $listing->user()->associate($request->user());

        $listing->save();

        return redirect()->route('listing.edit', [$region, $listing]);
    }

    public function edit(Request $request, Region $region, Listing $listing)
    {
        $this->authorize('edit', $listing);

        return view('listings.edit', compact('listing'));
    }

    public function update(StoreListingFormRequest $request, Region $region, Listing $listing)
    {
        $this->authorize('update', $listing);

        $listing->title = $request->title;
        $listing->body = $request->body;

        if (!$listing->live()) {
            $listing->category_id = $request->category_id;
        }

        $listing->region_id = $request->region_id;

        $listing->save();

        if ($request->has('payment')) {
            return redirect()->route('listing.payment.show', [$region, $listing]);
        }

        return back()->withSuccess('Listing updated!');
    }
}
