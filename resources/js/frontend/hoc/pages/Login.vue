<template>
        <div class="login-box">
            <div class="login-logo">
                <img src="/img/logo.png" class="img-responsive center-block">
                <!--<h4><b>Milo Backoffice</b></h4>-->
            </div>

            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form role="form">
                    <div class="form-group has-feedback">
                        <input placeholder="Username" type="text" class="form-control"  name="username" v-model="user.username" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input placeholder="Password" type="password" class="form-control"  name="password" v-model="user.password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button @click.prevent="login" class="btn bg-yellow btn-block btn-flat">Login <i v-show="loading" class="fa fa-spinner fa-pulse fa-fw"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</template>

<script>
    export default {
        data: () => ({
            user: {
                username: null,
                password: null
            },
            loading: false
        }),
        methods: {
            login() {
                if (this.user.username && this.user.password) {
                    this.loading = true;
                    this.$http
                        .post("/login", this.user)
                        .then(res => {
                            this.$store.dispatch("login", res.data.content);
                        })
                        .catch(err => {
                            this.loading = false;
                            this.user.password = null;
                            this.$notify({
                                type: "error",
                                title: "Whoops",
                                text: "invalid credential",
                                group: "event",
                                width: 900
                            });
                        });
                }
            }
        }
    };
</script>
