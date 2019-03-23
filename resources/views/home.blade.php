@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($regions as $country)
                    <div class="col-md-12">
                        <h3><a href="{{ route('user.region.store', $country) }}">{{ $country->name }}</a></h3>
                        <hr>
                    <div class="row">
                        @foreach ($country->children as $state)
                            <div class="col-md-4 mb-xl-4">
                                <h4><a href="{{ route('user.region.store', $state) }}">{{ $state->name }}</a></h4>
                                <hr>

                                @foreach ($state->children as $city)
                                    <h5><a href="{{ route('user.region.store', $city) }}">{{ $city->name }}</a></h5>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
@endsection
