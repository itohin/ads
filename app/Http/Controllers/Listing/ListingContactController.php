<?php

namespace App\Http\Controllers\Listing;

use App\Http\Requests\StoreContactFormRequest;
use App\Listing;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(StoreContactFormRequest $request, Region $region, Listing $listing)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        dd($listing);
    }
}
