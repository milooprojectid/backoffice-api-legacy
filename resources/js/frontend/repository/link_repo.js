import http from '../utils/http';

const getLinks = (page = 1, limit = 10, { search, status, source }) => http.get('/links', { params: { page, limit, search, status, source } });

const dispatch = id => http.post(`/links/${id}/dispatch`);

export default {
    getLinks,
    dispatch
};
