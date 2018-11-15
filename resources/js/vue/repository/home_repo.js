import http from '../http';

const getSummary = () => http.get('/home/summary');

export default {
    getSummary
};
