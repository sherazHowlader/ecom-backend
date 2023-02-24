import axios from "axios";
const API_BASE_URL = "/api/";

export const Api = axios.create({
    baseURL: API_BASE_URL,
    timeout: 60000
});

// api te request jawar age header a deafult token set kora
Api.interceptors.request.use(
    function (request) {
        request.headers = {
            'Authorization': 'Bearer ' + "121|5azPZT1qLSL2Hul9hQI0xtjR3RGQ9l83JJSHxTVr",
            'Accept': 'application/json',
        };

        return request;
    }, function (error) {
        return Promise.reject(error);
    }
);



