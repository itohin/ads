@extends('layouts.app')

@section('content')
    @if ($listings->count())
        @each ('listings.partials.listing_favorite', $listings,  'listing')

        {{ $listings->links() }}

    @else
        <p>No favorite listings.</p>
    @endif
@endsection