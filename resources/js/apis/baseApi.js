import axios from 'axios'

const baseApi = axios.create({
    baseURL: "/api",
    headers: {
        "Content-Type": "application/json",
    },
});

export default baseApi;
