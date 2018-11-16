import http from '../http';

const getLinks = (page = 1, limit = 10) => http.get('/links', { params: { page, limit } });

export default {
    getLinks
};
