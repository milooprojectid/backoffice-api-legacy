import http from '../http';

const getAllSource = () => http.get('/sources/all');

export default {
    getAllSource
};
