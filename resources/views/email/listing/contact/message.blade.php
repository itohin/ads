Hi, {{ $listing->user->name }} <br><br>
{{ $user->name }} has contacted you about your listing, <a href="{{ route('listings.show', [$listing->region, $listing]) }}">{{ $listing->title }}</a>
<br><br>

--- <br>

{!! nl2br(e($body)) !!} <br>

---