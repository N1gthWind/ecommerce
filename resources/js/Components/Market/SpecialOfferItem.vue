<template>
    <li class="product__sm-item d-flex align-items-center features-thum">
        <div class="product__sm-thumb mr-4">
            <Link :href="route('market.product.detail', { product: special_offer.id })">
            <div class="product__offer"><span class="discount">-{{ calculatePercentage().toFixed(0) }}%</span></div>
            <img v-if="special_offer?.media[0]?.original_url" :src="special_offer?.media[0]?.original_url" alt="">
            <img v-else :src="$page.props.assets.no_image_product" :alt="'Cart Item - ' + special_offer.id" />

            </Link>
        </div>
        <div class="product__sm-content">
            <h5 class="product__sm-title">
                <Link :href="route('market.product.detail', { product: special_offer.id })">{{ special_offer.name }}
                </Link>
            </h5>
            <div class="product__sm-price"><span class="price">${{ special_offer.discount_price }}</span></div>
        </div>
    </li>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
const props = defineProps({
    special_offer: {
        type: Object,
        required: true,
    }
})

const calculatePercentage = () => {
    return 100 * ((parseFloat(props.special_offer.price) - parseFloat(props.special_offer.discount_price)) / parseFloat(props.special_offer.price))
}
</script>

<style lang="scss">

</style>
