<!DOCTYPE html>
<html lang="es">
    <head>
        @include('admin.partials.head')
        @yield('head')
    </head>
    <body>
        @include('admin.partials.header')

        @include('admin.partials.nav')

        @include('admin.partials.main')
        
        @include('admin.partials.footer')

        @include('admin.modals.delete')

        @include('admin.partials.scripts')

        @yield('scripts')

        @stack('scripts')
    </body>
</html>