export const items = (state) => {
    return state.items;
}

export const quantity = (state) => {
    let sum = 0;
    for (let i = 0; i < state.items.length; i++) {
        let quantity  = parseInt(state.items[i].cart_quantity);
        sum += quantity;
    }
    return sum;
}

export const subtotal = (state) => {
    let sum = 0;
    for (let i = 0; i < state.items.length; i++) {
        let quantity  = parseInt(state.items[i].cart_quantity);
        let cartPrice  = state.items[i].discount_price ? parseInt(state.items[i].discount_price) : parseInt(state.items[i].regular_price);
        let price  = parseInt(cartPrice);
        sum += quantity * price;
    }
    return sum;
}
