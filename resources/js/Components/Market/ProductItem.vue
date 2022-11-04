<template>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" >
        <div class="product__item product__item-d">
            <div class="product__thumb fix">
                <div class="product-image w-img">
                    <Link :href="route('market.product.detail', { product: product.id })">
                    <img v-if="product?.media[0]?.original_url" :src="product?.media[0]?.original_url"
                        :alt="product.meta_title">
                    <img v-else :src="$page.props.assets.no_image_product" :alt="product.meta_title" />
                    </Link>
                </div>
                <div class="product-action">
                    <Link @click="addProductToWishlist(product.id)" class="icon-box icon-box-1">
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-heart"></i>
                    </Link>
                </div>
            </div>
            <div class="product__content-3">
                <h6>
                    <Link :href="route('market.product.detail', { product: product.id })">{{ product.name }}</Link>
                </h6>
                <div class="rating mb-5">
                    <ul>
                        <li v-for="(star, index) in Math.floor(product.avg_reviews)" :key="index"><span><i class="fa-solid fa-star text-yellow-500 text-xl"></i></span></li>
                        <li v-for="(star, index) in (5 - Math.floor(product.avg_reviews))" :key="index"><span><i class="fa-solid fa-star text-xl"></i></span></li>
                    </ul>
                    <span>({{ product.reviews_count }} review)</span>
                </div>
                <div v-if="product.discount_price == null" class="price mb-10">
                    <span>${{ product.price }}</span>
                    <p style="height: 28px;"></p>

                </div>
                <div v-else class="price mb-10">
                    <del class="font-semibold text-rose-600">${{ product.price }}</del>
                    <p class=" text-emerald-500 font-semibold text-lg">${{ product.discount_price }}</p>
                </div>
                <div class="price mb-10">
                    <span>In stock: {{ product.quantity }}</span>
                </div>

                <div class="price mb-10 text-sm text-gray-400">
                    <span style="flex: 1 1 auto;">Category: {{ product.category.name }}</span>
                </div>
            </div>
            <div class="product__add-cart-s text-center">
                <button style="background-color: rgb(234 179 8);" type="button" @click="AddToCart(product.id)"
                    :disabled="cart_form.processing"
                    class="cart-btn d-flex bg-yellow-500 mb-10 align-items-center justify-content-center w-100">
                    <span v-if="cart_form.processing">....</span><span v-else>Add to Cart</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";

const page = usePage();




const props = defineProps({
    product: {
        type: Object,
        required: true,
    }
})


const cart_form = useForm({
    id: props.product.id,
});

const addProductToWishlist = (id) => {
    Inertia.post(route('wishlist.store'), {
        'product_id': id,
    });
}

const AddToCart = (id) => {
    cart_form.post(route('cart.store'));
}
</script>

<style lang="scss">

</style>
