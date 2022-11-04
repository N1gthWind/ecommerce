<template>
    <section class="featured light-bg pt-55 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-between mb-30">
                        <div class="section__title">
                            <h5 class="st-titile">Most Sold Products</h5>
                        </div>
                        <div class="button-wrap">
                            <Link :href="route('market.shop')">See All Product <i class="fa-solid fa-chevron-right"></i>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div v-for="(product, index) in first_most_bought" :key="index" class="col-xl-6 col-lg-12">
                    <div class="single-features-item single-features-item-d b-radius mb-20">
                        <div class="row   align-items-center">
                            <div class="col-md-6">
                                <div class="features-thum">
                                    <div class="features-product-image w-img">
                                        <Link :href="route('market.product.detail', { product: product.id })">
                                        <img v-if="product?.media[0]?.original_url"
                                            :src="product?.media[0]?.original_url" :alt="product.meta_title">
                                        <img v-else :src="$page.props.assets.no_image_product"
                                            :alt="product.meta_title" />
                                        </Link>
                                    </div>
                                    <div class="product__offer">
                                        <span class="discount">-15%</span>
                                    </div>
                                    <div class="product-action">
                                        <Link @click="addProductToWishlist(product.id)" class="icon-box icon-box-1">
                                        <i class="fa-solid fa-heart"></i>
                                        <i class="fa-solid fa-heart"></i>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product__content product__content-d">
                                    <h6><a href="product-details.html">{{ product.name }}</a></h6>
                                    <div class="rating mb-5">
                                        <ul class="rating-d">
                                            <li v-for="(star, index) in Math.floor(product.avg_reviews)" :key="index">
                                                <span><i class="fa-solid fa-star text-yellow-500 text-xs"></i></span>
                                            </li>
                                            <li v-for="(star, index) in (5 - Math.floor(product.avg_reviews))"
                                                :key="index">
                                                <span><i class="fa-solid fa-star text-xs"></i></span>
                                            </li>
                                        </ul>
                                        <span>({{ product.reviews_count }} review)</span>
                                    </div>
                                    <div class="price d-price mb-10">
                                        <div v-if="product.discount_price == null" class="price">
                                            <span>${{ product.price }}</span>
                                            <p style="height: 28px;"></p>

                                        </div>
                                        <div v-else class="price">
                                            <del class="font-semibold text-rose-600">${{ product.price }}</del>
                                            <p class=" text-emerald-500 font-semibold text-lg">${{
                                                    product.discount_price
                                            }}</p>
                                        </div>
                                    </div>
                                    <div class="features-des mb-25">
                                        <ul>
                                            <li>{{ product.description }}</li>
                                        </ul>
                                    </div>
                                    <div class="cart-option">
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
                </div>

                <div class="col-xl-6 col-lg-12">

                    <div class="row">
                        <div v-for="(product, index) in get_sliced_products(1, 3)" :key="index" class="col-md-6">
                            <div class="single-features-item b-radius mb-20">
                                <div class="row   align-items-center">
                                    <div class="col-6">
                                        <div class="features-thum">
                                            <div class="features-product-image w-img">
                                                <Link :href="route('market.product.detail', { product: product.id })">
                                                <img v-if="product?.media[0]?.original_url"
                                                    :src="product?.media[0]?.original_url" :alt="product.meta_title">
                                                <img v-else :src="$page.props.assets.no_image_product"
                                                    :alt="product.meta_title" />
                                                </Link>
                                            </div>
                                            <div class="product__offer">
                                                <span class="discount">-15%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="product__content product__content-d">
                                            <h6><a href="product-details.html">{{ product.name }}</a></h6>
                                            <div class="rating mb-5">
                                                <ul>
                                                    <li v-for="(star, index) in Math.floor(product.avg_reviews)"
                                                        :key="index">
                                                        <span><i
                                                                class="fa-solid fa-star text-yellow-500 text-xs"></i></span>
                                                    </li>
                                                    <li v-for="(star, index) in (5 - Math.floor(product.avg_reviews))"
                                                        :key="index">
                                                        <span><i class="fa-solid fa-star text-xs"></i></span>
                                                    </li>
                                                </ul>
                                                <span>({{ product.reviews_count }} review)</span>
                                            </div>
                                            <div class="price d-price">
                                                <div v-if="product.discount_price == null" class="price">
                                                    <span>${{ product.price }}</span>
                                                    <p style="height: 28px;"></p>

                                                </div>
                                                <div v-else class="price">
                                                    <del class="font-semibold text-rose-600">${{ product.price }}</del>
                                                    <p class=" text-emerald-500 font-semibold text-lg">${{
                                                            product.discount_price
                                                    }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div v-for="(product, index) in get_sliced_products(3, 5)" :key="index" class="col-md-6">
                            <div class="single-features-item b-radius mb-20">
                                <div class="row   align-items-center">
                                    <div class="col-6">
                                        <div class="features-thum">
                                            <div class="features-product-image w-img">
                                                <Link :href="route('market.product.detail', { product: product.id })">
                                                <img v-if="product?.media[0]?.original_url"
                                                    :src="product?.media[0]?.original_url" :alt="product.meta_title">
                                                <img v-else :src="$page.props.assets.no_image_product"
                                                    :alt="product.meta_title" />
                                                </Link>
                                            </div>
                                            <div class="product__offer">
                                                <span class="discount">-25%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="product__content product__content-d">
                                            <h6><a href="product-details.html">{{ product.name }}</a></h6>
                                            <div class="rating mb-5">
                                                <ul>
                                                    <li v-for="(star, index) in Math.floor(product.avg_reviews)"
                                                        :key="index">
                                                        <span><i
                                                                class="fa-solid fa-star text-yellow-500 text-xs"></i></span>
                                                    </li>
                                                    <li v-for="(star, index) in (5 - Math.floor(product.avg_reviews))"
                                                        :key="index">
                                                        <span><i class="fa-solid fa-star text-xs"></i></span>
                                                    </li>
                                                </ul>
                                                <span>({{ product.reviews_count }} review)</span>
                                            </div>
                                            <div class="price d-price">
                                                <div v-if="product.discount_price == null" class="price">
                                                    <span>${{ product.price }}</span>
                                                    <p style="height: 28px;"></p>

                                                </div>
                                                <div v-else class="price">
                                                    <del class="font-semibold text-rose-600">${{ product.price }}</del>
                                                    <p class=" text-emerald-500 font-semibold text-lg">${{
                                                            product.discount_price
                                                    }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from '@vue/reactivity';

import { Inertia } from '@inertiajs/inertia';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";


const page = usePage();

const cart_form = useForm({
    id: null,
});



const props = defineProps({
    most_bought_products: Object,
})
// a computed ref
const first_most_bought = computed(() => {
    return [props.most_bought_products[0]];
})

const get_sliced_products = (first_param, second_param) => {
    return props.most_bought_products.slice(first_param, second_param);
};

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
