<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    @include('front.partials.head')
    @yield('head')
</head>
<body>
    @include('front.partials.overlay-menu')
    <div class="wrapper">
      @include('front.partials.navbar')



      @yield('content')


      @include('front.partials.footer')



    </div>

    @include('front.partials.scroll-up')

    @include('front.partials.scripts')

    @yield('scripts')
</body>
</html>
