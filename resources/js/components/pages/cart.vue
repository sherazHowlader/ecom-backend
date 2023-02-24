<template>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>

                <div class="cart-single-list" v-for="cart in carts" :key="cart.id">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html">
                                <img :src="'frontend/images/products/' + cart.image" alt="#">
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name">
                                <router-link :to="'/product/' + cart.slug"> {{ cart.name }}</router-link>
                            </h5>
                            <p class="product-des">
                                <span><em>Category:</em> {{ cart.category_name }} </span>
                                <span><em>Variant:</em> {{ cart.product_variant }} </span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary"
                                            @click.prevent="dec(cart)" :disabled="cart.cart_quantity <= 1">
                                        -
                                    </button>

                                    <input type="button" class="btn btn-secondary" :value="cart.cart_quantity">

                                    <button type="button" class="btn btn-info"
                                            @click.prevent="inc(cart)">
                                        +
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p> ৳ {{ (cart.discount_price ? cart.discount_price : cart.regular_price) * cart.cart_quantity }}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <span v-if="cart.discount_price">
                               {{ parseFloat((cart.regular_price - cart.discount_price) / cart.regular_price * 100).toFixed() }}%
                            </span>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" @click.prevent="removeCartItem(cart)"><i
                                class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon" v-if="!couponName">
                                        <form @submit.prevent='applyCoupon(couponInput)'>
                                            <input name="coupon" placeholder="Enter Your Coupon" v-model="couponInput">
                                            <div class="button">
                                                <button class="btn" type="submit"> Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li> Total Quantity <span> {{ quantity }} </span></li>
                                        <li> Subtotal <span> ৳ {{ subtotal }} </span></li>

                                        <li v-if="couponName">
                                            Coupon Applied - ({{ couponName }})
                                            <small class="text-danger font-bold " @click="cancelCoupon"
                                                   style="cursor: context-menu;">x</small>
                                            <span> {{ discount }}% </span>
                                        </li>

                                        <li>Shipping<span>Free</span></li>

                                        <li class="last">You Pay
                                            <span v-if="couponName">
                                                ৳ {{ subtotal - subtotal * discount / 100 }}
                                            </span>
                                            <span v-else>
                                                ৳ {{ subtotal }}
                                            </span>
                                        </li>
                                    </ul>

                                    <div class="button">
                                        <router-link :to="{name: 'checkout'}" class="btn"> Checkout</router-link>
                                        <router-link :to="{name: 'home'}" class="btn btn-alt"> Continue shopping
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "cart",

    data() {
        return {
            couponInput: '',
        }
    },

    computed: {
        ...mapGetters({
            quantity: 'cart/quantity',
            subtotal: 'cart/subtotal',
            carts: 'cart/items',
            couponName: 'couponName',
            discount: 'couponDiscount',
        })
    },

    methods: {
        ...mapActions({
            dec: 'cart/dec',
            inc: 'cart/inc',
            removeCartItem: 'cart/removeItem',
            applyCoupon: 'applyCoupon',
            cancelCoupon: 'cancelCoupon',
        }),
    },
}
</script>
