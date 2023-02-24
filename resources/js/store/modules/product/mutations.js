export const all_product = (state, payload) => {
    state.products = payload;
}

export const single_product = (state, payload) => {
    state.single_product = payload;
}

export const product_images = (state, payload) => {
    state.images = payload;
}

export const product_variants = (state, payload) => {
    state.variants = payload;
}
