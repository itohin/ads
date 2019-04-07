<?php

namespace App\Http\Controllers\Listing;

use App\Listing;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingPaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function show(Region $region, Listing $listing)
    {
        $this->authorize('touch', $listing);

        if ($listing->live()) {
            return back();
        }

        return view('listings.payment.show', compact('listing'));
    }

    public function store(Request $request, Region $region, Listing $listing)
    {
        $this->authorize('touch', $listing);

//        if ($listing->live()) {
//            return back();
//        }

        dd($request->payment_method_nonce);
    }
}
