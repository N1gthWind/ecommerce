<template>
    <MarketHeaderLayout :wishlists_count="$page.props?.auth?.user?.wishlists_count" :logo="$page.props.assets.logo"
        :categories="$page.props.data.categories" />
    <main>
        <section class="cart-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ToastNotification />
                        <ToastSuccessNotification />

                        <div v-if="$page.props.flash.success" class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                            role="alert">
                            <div>
                                <span class="font-medium"> {{ $page.props.flash.success }} </span>
                            </div>
                        </div>
                    </div>

                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <CartItem :cart_item="cart_item" v-for="(cart_item, index) in cart_items"
                                    :key="index" />
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                        placeholder="Coupon code" type="text">
                                    <button style="background:#fcbe00;" class="tp-btn-h1" name="apply_coupon"
                                        type="submit">Apply
                                        coupon</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul class="mb-20">
                                    <li>Total <span>${{ cart_total_price }}</span></li>

                                </ul>
                                <button class="tp-btn-h1" @click="checkout">Proceed to checkout</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
</template>

<script setup>
import MarketHeaderLayout from "@/Layouts/MarketHeaderLayout.vue";
import CartItem from "@/Components/Cart/CartItem.vue";
import { Inertia } from '@inertiajs/inertia';
import ToastNotification from "@/Components/ToastNotification.vue";
import ToastSuccessNotification from "@/Components/Market/ToastSuccessNotification.vue";

const props = defineProps({
    'cart_items': {
        type: Object,
        required: true,
    },
    'cart_total_price': {
        type: Number,
        required: true,
    },
})


const checkout = () => {
    Inertia.post(route('cart.checkout'));
}
</script>

<style lang="scss">

</style>
