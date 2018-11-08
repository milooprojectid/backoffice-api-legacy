
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Milo Backoffice</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
</head>
<body>
    <div class="uk-offcanvas-content">
        @include('layouts.header')
        @include('layouts.sidebar')
        @yield('content')
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit-icons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
</body>
</html>
