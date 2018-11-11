<!DOCTYPE html>
<html>
    @include('layout.header_script')

    <body class="hold-transition skin-yellow-light sidebar-mini fixed">
        <div class="wrapper">

            @include('layout.header')

            @include('layout.nav')

            <div class="content-wrapper">
                @yield('content')
            </div>

            @include('layout.footer')
        </div>

        @include('layout.footer_script')
    </body>
</html>
