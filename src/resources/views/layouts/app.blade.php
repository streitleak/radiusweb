<html>
    <head>
        <title>FreeCDR</title>
    </head>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery-ui.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery-ui-timepicker-addon.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui-timepicker-addon.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <body>
        <div id="warpper">
            <div id="header">@yield('header')</div>
            <div id="navigation">@yield('navigation')</div>
            <div id="leftcolumn">@yield('leftcolumn')</div>
            <div id="content">
                @yield('content')
            </div>
            <div id="footer">@yield('footer')</div>
        </div>
    </body>    
</html>