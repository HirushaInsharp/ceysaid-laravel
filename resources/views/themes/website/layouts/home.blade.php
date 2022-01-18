<!DOCTYPE html>
<html>
    <head>
        @include('themes.website.partials.head')
    </head>
    <body>
        <!-- navbar  -->
        @include('themes.website.partials.nav')
        <!-- end of navbar  -->
        <!-- social media -->
        @include('themes.website.partials.social-media')
        <!-- end of social media -->
        <!-- header -->
        @include('themes.website.partials.header')
        <!-- end of header -->
        @yield('content')
        <!-- footer -->
        @include('themes.website.partials.footer')
        <!-- end of footer -->

        <!-- foot -->
        @include('themes.website.partials.foot')
        <!-- end of foot -->

        @stack('js')
    </body>
</html>