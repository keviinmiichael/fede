<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    @include('front.partials.head')
    @yield('head')
</head>
<body>
    @include('front.partials.navbar')

    @include('front.partials.header')

	<div class="offcanvas-wrapper">

		@yield('content')


        @include('front.partials.footer')

    </div>
    <div class="site-backdrop"></div>

    @include('front.partials.scripts')

    @yield('scripts')
</body>
</html>
