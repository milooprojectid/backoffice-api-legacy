<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="1800"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/gif" href="{{asset('/img/logo-min.png')}}" />
    <title>@yield('page_title', 'Milo Backoffice')</title>
    <link rel="stylesheet" href="{{asset('/css/min.css')}}">
</head>
<body class="{{ Request::is('login') ? 'hold-transition login-page' : 'hold-transition skin-yellow-light sidebar-mini fixed' }}">
    <div id="milo-app">
        <App/>
    </div>
</body>
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/min.js')}}"></script>
</html>
