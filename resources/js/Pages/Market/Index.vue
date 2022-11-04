<template>
    <MarketHeaderLayout :wishlists_count="$page.props?.auth?.user?.wishlists_count" :logo="props.logo"
        :categories="$page.props.data.categories" />
    <main>
        <!-- slider-area-start -->
        <Slider />
        <!-- slider-area-end -->

        <!-- features__area-start -->
        <section class="features__area pt-20">
            <div class="container">
                <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 gx-0">
                    <div class="col">
                        <div class="features__item d-flex white-bg">
                            <div class="features__icon mr-20">
                                <i class="fa-solid fa-truck"></i>
                            </div>
                            <div class="features__content">
                                <h6>FREE DELIVERY</h6>
                                <p>For all orders over $120</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="features__item d-flex white-bg">
                            <div class="features__icon mr-20">
                                <i class="fa-solid fa-money-check"></i>
                            </div>
                            <div class="features__content">
                                <h6>SAFE PAYMENT</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="features__item d-flex white-bg">
                            <div class="features__icon mr-20">
                                <i class="fa-solid fa-circle-info"></i>
                            </div>
                            <div class="features__content">
                                <h6>24/7 HELP CENTER</h6>
                                <p>Delicated 24/7 support</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="features__item features__item-last d-flex white-bg">
                            <div class="features__icon mr-20">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <div class="features__content">
                                <h6>FRIENDLY SERVICES</h6>
                                <p>30 day satisfaction guarantee</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <ToastNotification />
        <!-- topsell__area-start -->
        <TopSellingArea :latest_products="latest_products" />
        <!-- topsell__area-end -->
        <MostSoldCatalog  :most_bought_products=" most_bought_products" />
        <!-- most-sold-start -->

        <!-- featured-end -->
        <Footer />
    </main>


</template>

<script setup>
import ToastNotification from "@/Components/ToastNotification.vue";
import MarketHeaderLayout from '@/Layouts/MarketHeaderLayout.vue';
import MostSoldCatalog from "@/Components/MostSoldCatalog.vue"
import Slider from "@/Components/Slider.vue";
import TopSellingArea from "@/Components/TopSellingArea.vue";
import Footer from "@/Components/Footer.vue";
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    logo: {
        type: String,
        default: null,
        required: false,
    },
    latest_products: {
        type: Object,
        required: true,
    },
    most_bought_products: Object,
});
</script>

<style lang="scss">

</style>

