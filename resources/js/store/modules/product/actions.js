import axios from "axios";

export const allProduct = ({commit}, slug) => {
    axios.get('api/products')
        .then((response) => {
            commit('all_product', response.data);
        })
}

export const getProduct = ({commit}, slug) => {
    axios.get(`/api/product/${slug}`)
        .then((response) => {
            commit('single_product', response.data);
        })
}

export const getImages = ({commit}, slug) => {
    axios.get(`/api/product-images/${slug}`)
        .then((response) => {
            commit('product_images', response.data);
        })
}

export const getVariant = ({commit}, slug) => {
    axios.get(`/api/product-variant/${slug}`)
        .then((response) => {
            commit('product_variants', response.data);
        })
}
