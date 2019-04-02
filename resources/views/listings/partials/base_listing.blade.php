<div class="media">
    <div class="media-body">
        <h5>
            <strong><a href="{{ route('listings.show', [$region, $listing]) }}">{{ $listing->title }}</a></strong>
            @if ($region->children->count())
                in {{ $listing->region->name }}
            @endif
        </h5>

        <ul class="list-inline">
            <li class="list-inline-item"><time>{{ $listing->created_at->diffForHumans() }}</time></li>
            <li class="list-inline-item">{{ $listing->user->name }}</li>
        </ul>
    </div>
</div>

@yield('links')