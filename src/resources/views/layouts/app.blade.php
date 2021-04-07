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
            <div id="header"><h1>FreeCDR WebUI</h1><div id=home>{{ route('/') }}</div><div id=status>@if {{ route('/login') }}</div></div>
            <div id="navigation">@yield('navigation')</div>
            <div id="leftcolumn">@yield('leftcolumn')</div>
            <div id="content">
                @yield('content')
            </div>
            <div id="footer"><h1>Copyrights by StreitLeak 2021</h1></div>
        </div>
    </body>    
</html>