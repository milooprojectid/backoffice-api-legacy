<template>
    <div>
        <notifications group="event" position="top center" :max="1"/>
        <router-view></router-view>
    </div>
</template>

<script>
    import store from "./store";
    import moment from 'moment';
    export default {
        mounted() {
            const isAuthenticated = store.getters.getToken;
            if (isAuthenticated) {
                const now = moment().format();
                const expirityDate = store.getters.getExpiresAt;
                if (now > expirityDate) {
                    store.dispatch('logout');
                } else {
                    const diff = moment(expirityDate).diff(moment(now), 'seconds') * 1000;
                    setTimeout(() => {
                        this.$notify({
                            group: 'event',
                            title: 'Session Expired',
                            text: 'Logging out now',
                            type: 'error'
                        });
                        setTimeout(() => {
                            store.dispatch('logout');
                        }, 750);
                    }, diff);
                }
            }
        }
    };
</script>
