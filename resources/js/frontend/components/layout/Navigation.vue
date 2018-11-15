<template>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <router-link to="/home" active-class="active" tag="li" exact>
                    <a><i class="fa fa-home"></i> <span>Home</span></a>
                </router-link>

                <router-link to="/source" active-class="active" tag="li" exact>
                    <a><i class="fa fa-newspaper-o"></i> <span>Source</span></a>
                </router-link>

                <router-link to="/link" active-class="active" tag="li" exact>
                    <a><i class="fa fa-link"></i> <span>Link</span></a>
                </router-link>

                <router-link to="/raw" active-class="active" tag="li" exact>
                    <a><i class="fa fa-database"></i> <span>Raw Data</span></a>
                </router-link>

                <router-link to="/corpus" active-class="active" tag="li" exact>
                    <a><i class="fa fa-book"></i> <span>Corpus</span></a>
                </router-link>

                <hr>

                <li>
                    <a href="/horizon" target="_blank"><i class="fa fa-desktop"></i> <span>Queue Monitor</span></a>
                </li>
            </ul>
        </section>
    </aside>
</template>

<script>
    export default {};
</script>
