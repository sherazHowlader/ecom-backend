import {createStore} from "vuex";
import cart from './modules/cart';
import product from './modules/product';

import state from "./state";
import * as getters from './getters';
import * as mutations from "./mutations";
import * as actions from "./actions";

const store = createStore({
    state,
    getters,
    mutations,
    actions,

    modules: {
        cart,
        product
    }
})
export default store;
