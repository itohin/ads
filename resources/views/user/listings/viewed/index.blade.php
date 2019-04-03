@extends('layouts.app')

@section('content')
    <p>Showing your last {{ $limit }} viewed listings</p>
    @if ($listings->count())
        @each ('listings.partials.listing', $listings,  'listing')

    @else
        <p>No viewed listings.</p>
    @endif
@endsection