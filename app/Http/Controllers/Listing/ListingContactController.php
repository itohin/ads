<?php

namespace App\Http\Controllers\Listing;

use App\Http\Requests\StoreContactFormRequest;
use App\Listing;
use App\Mail\ListingContactCreated;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ListingContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(StoreContactFormRequest $request, Region $region, Listing $listing)
    {
        Mail::to($listing->user)->queue(
            new ListingContactCreated($listing, $request->user(), $request->message)
        );

        return back()->withSuccess("Message sent to {$listing->user->name}");
    }
}
