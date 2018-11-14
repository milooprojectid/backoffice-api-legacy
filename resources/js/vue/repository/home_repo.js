import http from '../http';

const getSource = () => http.get('/home/source');

const getLink = () => http.get('/home/link');

const getRaw = () => http.get('/home/raw');

const getCorpus = () => http.get('/home/corpus');

export default {
    getSource,
    getLink,
    getRaw,
    getCorpus
};
