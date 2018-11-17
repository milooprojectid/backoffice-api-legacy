import http from '../utils/http';

const getRaws = (page = 1, limit = 10, { search, status, source }) => http.get('/raws', { params: { page, limit, search, status, source } });

export default {
    getRaws
};
