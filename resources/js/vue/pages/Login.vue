<template>
        <div class="login-box">
            <div class="login-logo">
                <img src="/img/logo.png" class="img-responsive center-block">
                <h4><b>Milo Backoffice</b></h4>
            </div>

            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form role="form">
                    <div class="form-group has-feedback">
                        <input placeholder="Username" type="text" class="form-control"  name="username" required>
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
        </div>
</template>

<script>
    export default {};
</script>
