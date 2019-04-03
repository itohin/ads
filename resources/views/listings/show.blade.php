@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (Auth::check())
                <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <nav class="nav flex-column">
                            <li class="nav-item"><a class="nav-link" href="">Email to a friend</a></li>
                            @if (!$listing->favoritedBy(Auth::user()))
                                <li class="nav-item">
                                    <a class="nav-link" href="#"
                                       onclick="event.preventDefault(); document.getElementById('listings-favorites-form').submit();">
                                        Add to favorites
                                    </a>
                                    <form
                                        action="{{ route('listing.favorites.store', [$region, $listing]) }}"
                                        method="post"
                                        id="listings-favorites-form"
                                        class="hidden"
                                    >
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
            @endif
            <div class="{{ Auth::check() ? 'col-md-9' : 'col-md-12' }}">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $listing->title }} in <span class="text-muted">{{ $listing->region->name }}</span></h4>
                    </div>
                    <div class="card-body">
                        {!! nl2br(e($listing->body)) !!}
                    </div>
                    <div class="card-footer text-muted">
                        Viewed x times
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        Contact {{ $listing->user->name }}
                    </div>
                    <div class="card-body">
                        @if (Auth::guest())
                            <p><a href="/register">Sign up</a> for account or <a href="/login">Sign in</a> to contact listing owners.</p>
                        @else
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                    <span class="form-text">
                                        This will email to {{ $listing->user->name }}
                                    </span>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection