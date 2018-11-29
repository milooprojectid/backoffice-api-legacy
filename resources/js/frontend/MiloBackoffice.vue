<template>
    <div>
        <notifications group="event" position="bottom right" :max="10" />
        <router-view />
    </div>
</template>

<script>
    import store from "./store";
    import moment from 'moment';
    import Listener from './utils/listener';
    export default {
        methods:{
            popNotification({ type, title, text }) {
                this.$notify({
                    type,
                    title,
                    text,
                    group: "event",
                    width: 400
                });
            }
        },
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

                // Global Listener
                const listener = new Listener('app');
                listener.bind('notification', this.popNotification);
                // --
            }


        }
    };
</script>
