<template>
    <div class="wrapper">
        <app-header/>
        <app-nav/>
        <div class="content-wrapper" style="min-height: 2000px">
            <slot></slot>
        </div>
        <app-footer/>
    </div>
</template>

<script>
    import Header from '../../components/layout/Header';
    import Footer from '../../components/layout/Footer';
    import Navigation from '../../components/layout/Navigation';
    export default {
        components:{
            AppHeader: Header,
            AppFooter: Footer,
            AppNav: Navigation
        }
    }
</script>
