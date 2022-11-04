<template>
    <MarketHeaderLayout :wishlists_count="$page.props?.auth?.user?.wishlists_count" :logo="$page.props?.assets.logo"
        :categories="$page.props.data.categories" />

    <!-- breadcrumb__area-start -->
    <section class="breadcrumb__area box-plr-75">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a :href="route('market.home')">Home</a></li>
                                <li class="breadcrumb-item"><a :href="route('market.shop')">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ product.name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb__area-end -->

    <!-- product-details-start -->
    <div class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="product__details-nav d-sm-flex align-items-start gap-3">
                        <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab"
                            role="tablist">

                            <li v-for="(media, index) in product.media" :key="index" class="nav-item"
                                role="presentation">
                                <button class="nav-link active" id="thumbOne-tab" data-bs-toggle="tab"
                                    data-bs-target="#thumbOne" type="button" role="tab" aria-controls="thumbOne"
                                    aria-selected="true">
                                    <img width="85" :src="media.original_url" alt="">
                                </button>
                            </li>
                        </ul>
                        <div class="product__details-thumb">
                            <div v-for="(media, index) in product.media" :key="index" class="tab-content"
                                id="productThumbContent">
                                <div class="tab-pane fade active show" id="thumbOne" role="tabpanel"
                                    aria-labelledby="thumbOne-tab">
                                    <div class="product__details-nav-thumb w-img">
                                        <img style="width: 600px;" width="600" :src="media.original_url" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="product__details-content">
                        <h6>{{ product.name }}</h6>
                        <div class="pd-rating mb-10">
                            <ul class="rating">
                                <li v-for="(star, index) in Math.floor(avg_review_rating)" :key="index">
                                    <a><i class="fa-solid fa-star text-yellow-500"></i></a>
                                </li>
                                <li v-for="(star, index) in (5 - Math.floor(avg_review_rating))" :key="index"><a><i
                                            class="fa-solid fa-star text-gray-500"></i></a></li>
                            </ul>
                            <span>({{ product.reviews_count }} review)</span>

                        </div>
                        <div v-if="product.discount_price == null" class="price mb-10">
                            <span>${{ product.price }}</span>
                        </div>
                        <div v-else class="price mb-10">
                            <del class="font-semibold text-rose-600">${{ product.price }}</del>
                            <p class=" text-emerald-500 font-semibold text-lg">${{ product.discount_price }}</p>
                        </div>
                        <div class="features-des mb-20 mt-10">
                            <ul>
                                <li>
                                    {{ product.description }}
                                </li>
                            </ul>
                        </div>
                        <div class="product-stock mb-20">
                            <h5>Availability: <span> {{ product.quantity }} in stock</span></h5>
                        </div>
                        <div class="cart-option mb-15">

                            <button :disabled="cart_form.processing" @click="AddToCart(product.id)" class="cart-btn">
                                <span v-if="cart_form.processing">....</span><span v-else>Add to Cart</span></button>
                        </div>
                        <!-- <div class="details-meta">
                            <div class="d-meta-left">
                                <div class="dm-item mr-20">
                                    <a href="#"><i class="fa-solid fa-heart"></i>Add to wishlist</a>
                                </div>
                                <div class="dm-item">
                                    <a href="#"><i class="fa-solid fa-layer-group"></i>Compare</a>
                                </div>
                            </div>
                            <div class="d-meta-left">
                                <div class="dm-item">
                                    <a href="#"><i class="fa-solid fa-share-alt"></i>Share</a>
                                </div>
                            </div>
                        </div> -->
                        <div class="product-tag-area mt-15">
                            <div class="product_info">
                                <span class="posted_in">
                                    <span class="title">Categories:</span>
                                    <span>{{ product.category.name }}</span>
                                </span>
                                <!-- <span class="tagged_as">
                                    <span class="title">Tags:</span>
                                    <a href="#">Smartphone</a>,
                                    <a href="#">Tablets</a>
                                </span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details-end -->

    <!-- product-details-des-start -->
    <div class="product-details-des mt-40 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="product__details-des-tab">
                        <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="review-tab" data-bs-toggle="tab"
                                    data-bs-target="#review" type="button" role="tab" aria-controls="review"
                                    aria-selected="true">Reviews ({{ product.reviews_count }}) </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="prodductDesTaContent">
                <div class="tab-pane fade active show" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="product__details-review">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="review-rate">
                                    <h5>{{ avg_review_rating.toFixed(2) }}</h5>
                                    <div class="review-star text-2xl">
                                        <span v-for="(star, index) in Math.floor(avg_review_rating)" :key="index">
                                            <i class="fas fa-star checked"></i>
                                        </span>
                                        <span v-for="(star, index) in (5 - Math.floor(avg_review_rating))" :key="index">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="review-des-infod">
                                    <h6>{{ product.reviews_count }} review for "<span>{{ product.name }}</span>"</h6>
                                    <div class="review-container">

                                        <div v-for="(review, index) in product.reviews" :key="index"
                                            class="review-details-des">
                                            <div class="review-details-content">
                                                <div class="str-info">
                                                    <div class="review-star mr-15">
                                                        <a v-for="(star, index) in review.stars" :key="index"><i
                                                                class="fa-solid fa-star"></i></a>
                                                        <span v-for="(star, index) in (5 - Math.floor(review.stars))"
                                                            :key="index"><i
                                                                class="fa-solid fa-star text-gray-500"></i></span>
                                                    </div>
                                                </div>
                                                <div class="name-date mb-30">
                                                    <h6> {{ review.user.name }} – <span>{{ review.created_at }}</span>
                                                    </h6>
                                                </div>
                                                <p>{{ review.text }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="can_review" class="row">
                            <div class="col-xl-12">
                                <div class="product__details-comment ">
                                    <div class="comment-title mb-4">
                                        <h3>Add a review</h3>
                                        <p class="text-xl">Your email address will not be published. Required fields are
                                            marked *</p>
                                        <p class="text-xl">Click on the stars, to select the review rating!</p>
                                    </div>

                                    <div class="comment-input-box">
                                        <form>
                                            <div class="row">
                                                <div class="col-xxl-12">
                                                    <div class="review-star text-2xl">
                                                        <span v-for="(star, index) in review_form.stars" :key="index"
                                                            @click="changeRating(index + 1)">
                                                            <i class="fas fa-star checked"></i>
                                                        </span>
                                                        <span v-for="(star, index) in (5 - review_form.stars)"
                                                            :key="index"
                                                            @click="changeRating(index + (review_form.stars + 1))">
                                                            <i class="fas fa-star"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <textarea v-model="review_form.review" placeholder="Your review"
                                                        class="comment-input comment-textarea"></textarea>
                                                </div>
                                                <div class="col-xxl-12">
                                                    <div class="comment-submit">
                                                        <button @click="submitReview" :disabled="review_form.processing"
                                                            style="background-color:gold;" type="submit"
                                                            class="cart-btn">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details-des-end -->
</template>

<script setup>
import MarketHeaderLayout from "@/Layouts/MarketHeaderLayout.vue";
import { Inertia } from '@inertiajs/inertia';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const props = defineProps({
    product: Object,
    avg_review_rating: Number,
    can_review: Boolean,
});

const star_count = ref(3);



const review_form = useForm({
    stars: star_count.value,
    review: '',
});
const cart_form = useForm({
    id: props.product.id,
});


const changeRating = (number) => {

    review_form.stars = parseInt(number);
}

const submitReview = () => {
    review_form.post(route('review.store', { product: props.product }));
}

const AddToCart = (id) => {
    cart_form.post(route('cart.store'));
}



</script>

<style lang="scss" scoped>
.checked {
    color: #fcbe00;
}
</style>
