<template>
    <Swiper :spaceBetween="30" :centeredSlides="true" :autoplay="{
        delay: 4500,
        disableOnInteraction: false,
    }" :pagination="{
    clickable: true,
}" :modules="modules" class="mySwiper">
        <SwiperSlide>
            <div class="single-slider swiper-slide slider-height d-flex align-items-center"
                style="background-image: url('assets/slider/1.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="slider-content">
                                <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="1.5s">
                                    <a href="product-details.html" class="st-btn b-radius">HOT DEALS</a>
                                </div>
                                <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">SALE
                                    30% OFF <br> FUTURE FOOTBALL BOOTS</h2>
                                <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">Discount 30%
                                    On Products & Free Shipping</p>
                                <div class="slider-bottom-btn mt-75">
                                    <Link as="button" :href="route('market.shop')" class="st-btn-b b-radius">Discover
                                    now</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </SwiperSlide>
        <SwiperSlide>
            <div class="single-slider swiper-slide slider-height d-flex align-items-center"
                style="background-image: url('assets/slider/2.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="slider-content">
                                <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="1.5s">
                                    <Link href="product-details.html" class="st-btn b-radius">HOT DEALS</Link>
                                </div>
                                <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">SALE
                                    30% OFF <br> FUTURE FOOTBALL BOOTS</h2>
                                <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">Discount 30%
                                    On Products & Free Shipping</p>
                                <div class="slider-bottom-btn mt-75">
                                    <Link as="button" :href="route('market.shop')" class="st-btn-b b-radius">Discover
                                    now</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </SwiperSlide>
    </Swiper>
</template>

<script>

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";
import { Link } from '@inertiajs/inertia-vue3';
// Import Swiper styles
import "swiper/css";

import "swiper/css/pagination";
import "swiper/css/navigation";

// import required modules
import { Autoplay, Pagination, Navigation } from "swiper";

export default {
    components: {
        Swiper,
        SwiperSlide,
        Link,
    },
    setup() {
        return {
            modules: [Autoplay, Pagination, Navigation],
        };
    },
};
</script>

<script setup>


</script>
<style scoped>

.main-slider-paginations .swiper-pagination-bullet-active {
    position: relative;
    width: 35px;
    border-radius: 10px;
    background: #ffffff;
    opacity: 1;
}
</style>
