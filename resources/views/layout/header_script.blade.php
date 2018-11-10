<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="1800"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <link rel="icon" type="image/gif" href="{{asset('/img/icon.png')}}" />
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="{{asset('/css/min.css')}}">

    @yield('header_script_ext')
</head>
