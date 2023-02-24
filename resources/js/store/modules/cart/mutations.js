export const add_items = (state, {product, qty, variant}) => {

    let sku = variant.SKU ? variant.SKU : product.SKU;
    let ProVariant =  variant.size ? variant.size : "Default";
    let RegPrice = variant.regular_price ? variant.regular_price : product.regular_price;
    let DisPrice = variant.discount_price ? variant.discount_price : product.discount_price;

    const productInCart = state.items.find(item => {
        return item.SKU === sku;
    });

    if (productInCart) {
        // ekhane data gulo string akare aschilo
        // tai string data ke intiger a convert korar jonno parseInt() use kora hoiche
        // eta na korle 2 tar value + hobe na (Exm: 2+2=4 er poriborte 22 dekhabe)
        let cQuantity = parseInt(productInCart.cart_quantity);
        let inQuantity = parseInt(qty);
        let total = cQuantity += inQuantity;

        return productInCart.cart_quantity = total;
    } else {
        let product_price = '';

        if (product.discount_price) {
            product_price = product.discount_price;
        } else {
            product_price = product.regular_price;
        }
        state.items.push({
            product_id: product.id,
            category_name: product.category_name,
            image: product.image,
            name: product.name,
            cart_quantity: qty,
            SKU: sku,
            product_variant: ProVariant,
            regular_price: RegPrice,
            discount_price: DisPrice
        })
    }
}

export const set_items = (state, items) => {
    state.items = items
}

export const inc = (state, cart) => {
    let productInCart = state.items.find(item => {
        return item.SKU == cart.SKU;
    });

    if (productInCart) {
        return productInCart.cart_quantity++;
    }
}

export const dec = (state, cart) => {
    let productInCart = state.items.find(item => {
        return item.SKU == cart.SKU;
    });

    if (productInCart) {
        return productInCart.cart_quantity--;
    }
}

export const remove_items = (state, cart) => {
    state.items = state.items.filter((item) => {
        return item.SKU !== cart.SKU;
        // ekhane emon 2 ta colum dhorte je 2 ta colum sobsomoy change hoy
        // item.product_id __dhorle hobe na...karon variant alada holeo id to ekhoi thake
    })
}

