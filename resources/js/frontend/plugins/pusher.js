import Pusher from 'pusher-js';

export default (function () {
    let instance;

    function createInstance() {
        return new Pusher(process.env.MIX_PUSHER_APP_KEY, { cluster: process.env.MIX_PUSHER_APP_CLUSTER });
    }

    return {
        getInstance:() => {
            if (!instance) {
                instance = createInstance();
            }
            return instance;
        }
    };
})();
