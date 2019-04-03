@component ('listings.partials.base_listing', compact('listing'))

    @slot ('links')
        <ul class="list-inline">
            <li>Added {{ $listing->pivot->created_at->diffForHumans() }}</li>
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('listing-{{ $listing->id }}').submit();">Delete</a></li>

            <form action="{{ route('listing.favorites.destroy', [$region, $listing]) }}" method="post" id="listing-{{ $listing->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
        </ul>
    @endslot

@endcomponent

