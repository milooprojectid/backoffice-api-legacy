@section('page_title','Login')

<html>
@include('layout.header_script')

<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        {{--<a href="{{url('/dosen/login')}}"><b>{{config('app.name')}}</b></a>--}}
        {{--<img src="{{asset('/img/fte.png')}}" class="img-responsive">--}}
        <h4><b>Milo Backoffice</b></h4>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        {{--<p class="login-box-msg"><b>Administrator</b></p>--}}
        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" class="form-control"  name="username" value="{{old('username')}}" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control"  name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-lg-12">
                    <button type="submit" class="btn bg-purple btn-block btn-flat">Login</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    @if($errors->all())
        <br>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            {{$errors->first()}}
        </div>
    @endif
</div>

@include('layout.footer_script')

</body>
</html>

