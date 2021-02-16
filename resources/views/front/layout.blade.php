@include('layouts.header')


@include('layouts.navigation-public')


    {{--<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">--}}
    @yield('content')


@include('layouts.footer')


