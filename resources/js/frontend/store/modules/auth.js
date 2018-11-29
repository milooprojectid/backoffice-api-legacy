import router from '../../router';
import moment from 'moment';
import Listener from '../../utils/listener';
import Vue from 'vue';

const state = {
    token: null,
    refreshToken: null,
    expiresAt: null
};

const getters = {
    getToken(state) {
        return state.token;
    },
    getRefreshToken(state) {
        return state.refreshToken;
    },
    getExpiresAt(state) {
        return state.expiresAt;
    }
};

const mutations = {
    setToken(state, { token, refreshToken, expiresAt }) {
        state.token = token;
        state.refreshToken = refreshToken;
        state.expiresAt = expiresAt;
    },
    flushToken(state) {
        state.token = null;
        state.refreshToken = null;
        state.expiresAt = null;
    }
};

const actions = {
    logout({ commit }) {
        commit('flushToken');
        router.replace('/login'); // hard reload
    },
    login({ commit }, { token, refreshToken, expiresIn }) {
        const expiresAt = moment().add(expiresIn, 'seconds').format();
        commit('setToken', { token, refreshToken, expiresAt });
        const now = moment().format();
        const diff = moment(expiresAt).diff(moment(now), 'seconds') * 1000;
        setTimeout(() => {
            // notification should be placed here
            setTimeout(() => {
                commit('flushToken');
            }, 750);
        }, diff);

        // Register listener
        const listener = new Listener('app');
        listener.bind('notification', inputs => {
            Vue.prototype.$notify({ ...inputs, group: "event",  width: 400 });
        });

        // --

        router.replace('/home');
    }
};

export default {
    state,
    getters,
    mutations,
    actions
};
