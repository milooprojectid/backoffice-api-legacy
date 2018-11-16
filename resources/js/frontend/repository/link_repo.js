import http from '../http';

const getLinks = (page = 1, limit = 10, { search, status, source }) => http.get('/links', { params: { page, limit, search, status, source } });

export default {
    getLinks
};
