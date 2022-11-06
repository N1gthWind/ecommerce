<template>
    <MarketHeaderLayout :wishlists_count="$page.props?.auth?.user?.wishlists_count" :logo="$page.props.assets.logo"
        :categories="$page.props.data.categories" />
    <section class="cart-area pb-120 pt-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table v-if="$page.props?.auth?.user?.wishlists_count">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Price per unit</th>
                                        <th class="product-quantity">Available Quantity</th>
                                        <th class="product-subtotal">Category</th>
                                        <th class="product-remove">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(wishlist, index) in wishListFiltered" :key="index">
                                        <td class="product-thumbnail">

                                            <img v-if="wishlist?.product?.media[0]?.original_url"
                                                :src="wishlist?.product?.media[0]?.original_url"
                                                :alt="wishlist?.product?.meta_title">
                                            <img v-else :src="$page.props.assets.no_image_product"
                                                :alt="wishlist?.product?.meta_title" />

                                        </td>
                                        <td class="product-name"><a href="shop-details.html">{{ wishlist.product?.name
                                        }}</a></td>
                                        <td class="product-price"><span class="amount">${{ wishlist.product?.price
                                        }}</span></td>
                                        <td class="product-quantity">
                                            <span>{{ wishlist.product?.quantity }}</span>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">{{
                                                wishlist.product?.category?.name
                                        }}</span></td>
                                        <td class="product-remove">
                                            <button @click="removeFromWishlist(wishlist.id)"
                                                style="background-color: crimson"
                                                class="button btn btn-danger waves-effect waves-light mb-2 me-2"
                                                type="submit">Remove</button>
                                            <button style="background-color:darkgreen"
                                                @click="AddToCart(wishlist.product.id)"
                                                :disabled="cart_form.processing"
                                                class="button btn btn-success waves-effect waves-light mb-2 me-2"
                                                type="submit"><span v-if="cart_form.processing">....</span><span
                                                    v-else>Add to Cart</span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div v-else>
                                <h1 class="text-center font-bold text-2xl">No wishlists found!</h1>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import MarketHeaderLayout from "@/Layouts/MarketHeaderLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { computed } from "vue";


const props = defineProps({
    wishlists: {
        type: Object,
        required: true,
    },
    wishlists_count: {
        type: Number,
        required: false,
        default: 0,
    }

})




const wishListFiltered = computed(() => {

    return props.wishlists.filter(wishlist => wishlist?.product !== null)
});

const page = usePage();

const cart_form = useForm({
    id: null,
});

const AddToCart = (id) => {
    cart_form.id = id;
    cart_form.post(route('cart.store'));
}


const removeFromWishlist = (id) => {
    Inertia.delete(route('wishlist.destroy', { wishlist: id }));
}
</script>

<style lang="scss">

</style>
