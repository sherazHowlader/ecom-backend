import axios from "axios";
import router from "../router";
import Token from "../service/Token";

export const applyCoupon = ({commit}, data) => {
    let addData = new FormData();
    addData.append("coupon", data);

    axios.post('api/coupon/', addData)
        .then((response) => {
            commit('set_coupon', response.data)
        })
}

export const cancelCoupon = ({commit}) => {
    commit('remove_coupon')
}

export const login = ({commit, dispatch}, formData) => {
    axios.post("api/login", formData)
        .then((response) => {
            commit('isAuthenticated', response.data.token)
            router.back();
            console.log(response.data.message);
        })
        .catch((error) => {
            console.log(error.response.data.message);
        });
}

export const tokenLoad = ({commit}) => {
    Token.get()
        .then((response) => {
            commit('isAuthenticated', response.data)
        })
    ;
}
