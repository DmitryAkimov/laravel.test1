<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('layout.partials.head')
 

</head>

<body>

    @include('layout.partials.nav')

    @include('layout.partials.header')

    @yield('content')

    @include('layout.partials.footer')

    @include('layout.partials.footer-scripts')


</body>

</html>