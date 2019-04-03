<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')

        <main class="py-4">
            <div class="container">
                @include('layouts.partials.alerts')
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
