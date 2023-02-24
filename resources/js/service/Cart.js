import {Api} from "./axiosInstance";

const END_POINT = 'cart';

export default {
    all() {
        return Api.get(END_POINT);
    },

    store(url, data) {
        return Api.post(`${url}`, data);
    },

    inc(url, SKU) {
        return Api.get(`${url}/${SKU}`);
    },

    dec(url, SKU) {
        return Api.get(`${url}/${SKU}`);
    },

    delete(url, SKU) {
        return Api.delete(`${url}/${SKU}`);
    },
}
