import http from '../utils/http';

const getAllSources = () => http.get('/sources', { params: { all: 1 } });

const getSources = (page = 1, limit = 10, { search, status }) => http.get('/sources', { params: { page, limit, search, status } });

export default {
    getAllSources,
    getSources
};
