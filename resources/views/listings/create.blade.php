@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Listing</div>

                    <div class="card-body">
                        <form action="{{ route('listing.store', [$region]) }}" method="post">
                            {{ csrf_field() }}
                            @include ('listings.partials.forms.regions')
                            @include ('listings.partials.forms.categories')
                            <div class="form-group">
                                <label for="title" class="control-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                                @if ($errors->has('title'))
                                    <span class="form-text">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="body" class="control-label">Body</label>
                                <textarea name="body" id="body" cols="30" rows="8" class="form-control"></textarea>
                                @if ($errors->has('body'))
                                    <span class="form-text">{{ $errors->first('body') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
