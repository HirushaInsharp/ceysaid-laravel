<!DOCTYPE html>
<html>

<head>
    @include('themes.website.partials.head')
</head>

<body>
    @php
        $currentRouteName = \Request::route()->getName();
    @endphp
    <!-- navbar  -->
    @include('themes.website.partials.nav')
    <!-- end of navbar  -->
    <!-- @if ($currentRouteName == 'tour')
        @include('themes.website.partials.second-nav')

        @include('themes.website.partials.social-media')
    @else
        @include('themes.website.partials.header')
    @endif -->
    <!-- end of header -->
    @yield('content')
    <!-- footer -->
    @include('themes.website.partials.footer')
    <!-- end of footer -->

    <!-- foot -->
    @include('themes.website.partials.foot')
    <!-- end of foot -->

    <!-- @stack('js') -->
</body>

</html>
