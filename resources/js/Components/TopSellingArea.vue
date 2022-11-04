<template>
    <section class="top-dels light-bg-s pt-30">
        <div class="container">
            <div class="row mb-4 mt-4">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-between mb-30">
                        <div class="section__title section__title-2">
                            <h5 class="st-titile-d st-titile-d-2">Latest products</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                <div v-for="(product, index) in latest_products" :key="index" class="col">
                    <div class="product__item">
                        <div class="product__thumb fix">
                            <div class="product-image w-img">
                                <Link :href="route('market.product.detail', { product: product.id })">
                                <img v-if="product?.media[0]?.original_url" :src="product?.media[0]?.original_url"
                                    :alt="product.meta_title">
                                <img v-else :src="$page.props.assets.no_image_product" :alt="product.meta_title" />
                                </Link>
                            </div>
                            <div class="product__offer">
                                <span class="discount">-9%</span>
                            </div>
                            <div class="product-action">
                                <Link @click="addProductToWishlist(product.id)"  class="icon-box icon-box-1">
                                <i class="fa-solid fa-heart"></i>
                                <i class="fa-solid fa-heart"></i>
                                </Link>

                            </div>
                        </div>
                        <div class="product__content">
                            <h6><a href="product-details.html">{{ product.name }}</a></h6>
                            <div class="rating mb-5">
                                <ul>
                                    <li v-for="(star, index) in Math.floor(product.avg_reviews)" :key="index"><span><i
                                                class="fa-solid fa-star text-yellow-500 text-xl"></i></span></li>
                                    <li v-for="(star, index) in (5 - Math.floor(product.avg_reviews))" :key="index">
                                        <span><i class="fa-solid fa-star text-xl"></i></span>
                                    </li>
                                </ul>
                                <span>({{ product.reviews_count }} review)</span>
                            </div>
                            <div class="price">
                                <div v-if="product.discount_price == null" class="price">
                                    <span>${{ product.price }}</span>
                                    <p style="height: 28px;"></p>

                                </div>
                                <div v-else class="price">
                                    <del class="font-semibold text-rose-600">${{ product.price }}</del>
                                    <p class=" text-emerald-500 font-semibold text-lg">${{ product.discount_price }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="product__add-cart text-center">
                            <button style="background-color: rgb(234 179 8);" type="button"
                                @click="AddToCart(product.id)" :disabled="cart_form.processing"
                                class="cart-btn d-flex bg-yellow-500 mb-10 align-items-center justify-content-center w-100">
                                <span v-if="cart_form.processing">....</span><span v-else>Add to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";

const page = usePage();
const props = defineProps({
    latest_products: Object,
})

const cart_form = useForm({
    id: null,
});

const addProductToWishlist = (id) => {
    Inertia.post(route('wishlist.store'), {
        'product_id': id,
    });
}

const AddToCart = (id) => {
    cart_form.id = id;
    cart_form.post(route('cart.store'));
}

</script>

<style lang="scss">

</style>
