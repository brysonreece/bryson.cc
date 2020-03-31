<!DOCTYPE html>

<html lang="en-US">
    @include('partials.head')

    <body>
        @include('partials.nav')
        @yield('content')
    </body>

    @include('partials.scripts')
</html>