@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pay for your listing</div>

                    <div class="card-body">
                        @if ($listing->cost() == 0)
                            <form action="{{ route('listing.store', [$region, $listing]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <p>Nothing for you to pay</p>

                                <button type="submit" class="btn btn-primary">Complete</button>
                            </form>
                        @else
                            <p>Total cost: ${{ number_format($listing->cost(), 2) }}</p>
                            <payment-form></payment-form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
