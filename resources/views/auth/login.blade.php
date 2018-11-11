<html>
@include('layout.header_script')

<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <img src="{{asset('/img/logo.png')}}" class="img-responsive center-block">
        <h4><b>Milo Backoffice</b></h4>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input placeholder="Username" type="text" class="form-control"  name="username" value="{{old('username')}}" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input placeholder="Password" type="password" class="form-control"  name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn bg-yellow btn-block btn-flat">Login</button>
                </div>
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

