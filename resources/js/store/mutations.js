export const set_coupon = (state, payload) => {
    if (payload) {
        localStorage.setItem('couponDiscount', payload['discount']);
        localStorage.setItem('couponName', payload['name']);


        state.couponName = payload['name'];
        state.couponDiscount = payload['discount'];

        console.log('Coupon Applied')
    } else {
        console.log('wrong coupon')
    }
}

export const remove_coupon = (state) => {
    localStorage.removeItem('couponDiscount');
    localStorage.removeItem('couponName');

    state.couponName = "";
    state.couponDiscount = "";
}

export const isAuthenticated = (state, payload) => {
    state.isAuthenticated = payload;
}
