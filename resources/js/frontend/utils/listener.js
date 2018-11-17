import Pusher from './plugins/pusher';

class Listener {
    constructor(channel){
        this.pusher = Pusher.getInstance();
        this.pusher.subscribe(channel);
    }

    bind(event, callback){
        this.pusher.bind(event, callback);
    }
}

export default Listener;
