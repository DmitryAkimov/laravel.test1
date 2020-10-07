<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Dmitriy Akimov">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>MDM.@yield('title')</title>
        @include('layout.mdm_head')
    </head>
    <body>


        <div class="container">
            @yield('content')
        </div>
        @include('layout.mdm_footer')
    </body>
</html>