<template>
    <header class="main-header">

    <span class="logo">
        <span class="logo-mini"><b>M</b></span>
        <span class="logo-lg"><b>Milo</b> <small>backoffice</small></span>
    </span>

        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li @click="logout"><a><i class="fa fa-power-off"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>

</template>

<script>
    export default {
        methods:{
            logout() {
                this.$store.dispatch("logout");
            }
        }
    };
</script>
