<!doctype html>
<html lang="en">
@include('layout.header_script')
<body class="{{ Request::is('login') ? 'hold-transition login-page' : 'hold-transition skin-yellow-light sidebar-mini fixed' }}">
    <div id="milo-app">
        <App/>
    </div>
</body>
@include('layout.footer_script')
</html>
