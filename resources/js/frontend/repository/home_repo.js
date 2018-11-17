import http from '../utils/http';

const getSummary = () => http.get('/home/summary');

export default {
    getSummary
};
