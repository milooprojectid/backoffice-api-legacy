<template>
    <!--<layout>-->
        <section class="content">
            <br><br><br><br>
            <br><br><br><br>
            <div class="error-page">
                <h2 class="headline text-yellow"> 404</h2>

                <div class="error-content">
                    <br>
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                    <p>
                        We could not find the page you were looking for. <br>
                        <router-link tag="a" to="/home">Return to home</router-link>
                    </p>
                </div>
            </div>
        </section>
    <!--</layout>-->
</template>

<script>
    import layout from '../layouts/Default';
    export default {
        components:{
            layout
        }
    };
</script>
