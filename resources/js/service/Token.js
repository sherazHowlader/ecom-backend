import { Api } from "./axiosInstance";

const END_POINT = 'mytoken';

export default {
    get() {
        return Api.get(END_POINT);
    },
}
