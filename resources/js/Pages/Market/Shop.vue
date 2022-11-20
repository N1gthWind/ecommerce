<template>
    <MarketHeaderLayout :wishlists_count="$page.props?.auth?.user?.wishlists_count" :logo="props.logo"
        :categories="$page.props.data.categories" />

    <main>
        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->

        <!-- shop-area-start -->
        <div class="shop-area mb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <ToastNotification />

                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Filter By Price</h5>
                            <div class="w-full">
                                <label for="range" class="font-bold mt-4 text-gray-600">Price($)</label>
                            </div>
                            <div class="flex gap-2">
                                <div class="w-1/2 mt-2">
                                    <label for="min_price" class="block text-sm font-medium text-gray-700">Min
                                        price</label>
                                    <div class="mt-1">
                                        <input type="number" name="min_price" id="min_price" v-model="price_range.min"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            placeholder="0">
                                    </div>
                                </div>
                                <div class="w-1/2 mt-2">
                                    <label for="max_price" class="block text-sm font-medium text-gray-700">Max
                                        price</label>
                                    <div class="mt-1">
                                        <input type="number" name="max_price" id="max_price" v-model="price_range.max"
                                            class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                            placeholder="999">
                                    </div>

                                </div>

                            </div>
                            <button type="button" @click="set_price_range_selected"
                                class="cart-btn d-flex mt-4 bg-yellow-500 align-items-center justify-content-center w-100">
                                Filter </button>

                        </div>
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Choose Rating</h5>
                            <div class="widget-category-list mt-2">
                                <div class="relative flex items-center mt-2"
                                    v-for="(rating, index) in each_review_avg_count" :key="index">
                                    <input :value="parseInt(index)" v-model="review_rating" id="star"
                                        aria-describedby="comments-description" name="star" type="checkbox"
                                        class="focus:ring-yellow-500 h-4 w-4 text-yellow-600 border-gray-300 rounded">
                                    <RatingCheckBoxStars :star_count="parseInt(index)" :review_number="rating" />
                                </div>

                                <button @click="set_rating_selected" type="button"
                                    class="cart-btn d-flex mt-4 bg-yellow-500 align-items-center justify-content-center w-100">
                                    Filter rating </button>
                            </div>
                        </div>
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Special Offers</h5>
                            <div class="product__sm mt-8">
                                <ul>
                                    <SpecialOfferItem v-for="(special_offer, index) in special_offers" :key="index"
                                        :special_offer="special_offer" />
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="product-lists-top">
                            <div class="product__filter-wrap">
                                <div class="row align-items-center">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <div class="product__filter d-sm-flex align-items-center">
                                            <div class="product__col">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button @click="set_layout_value_to_true" class="nav-link"
                                                            :class="{ active: layout_product_list }" id="FourCol-tab"
                                                            data-toggle="tab" data-target="#FourCol" type="button"
                                                            role="tab" aria-controls="FourCol" aria-selected="true">
                                                            <i class="fa-solid fa-table-cells"></i>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button @click="set_layout_value_to_false" class="nav-link"
                                                            :class="{ active: !layout_product_list }" id="FiveCol-tab"
                                                            data-toggle="tab" data-target="#FiveCol" type="button"
                                                            role="tab" aria-controls="FiveCol" aria-selected="false">
                                                            <i class="fa-solid fa-list"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__result pl-60">
                                                <p>Showing {{ pagination_number }} of {{ product_count }} relults</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <div
                                            class="product__filter-right d-flex align-items-center justify-content-md-end">
                                            <div class="product__sorting product__show-no">
                                                <Menu as="div" class="relative inline-block text-left">
                                                    <div>
                                                        <MenuButton
                                                            class="inline-flex w-full justify-center gap-1 items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                                                            {{ pagination_number }}
                                                            <i class="fa-sharp fa-solid fa-chevron-down"></i>
                                                        </MenuButton>
                                                    </div>

                                                    <transition enter-active-class="transition ease-out duration-100"
                                                        enter-from-class="transform opacity-0 scale-95"
                                                        enter-to-class="transform opacity-100 scale-100"
                                                        leave-active-class="transition ease-in duration-75"
                                                        leave-from-class="transform opacity-100 scale-100"
                                                        leave-to-class="transform opacity-0 scale-95">
                                                        <MenuItems
                                                            class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                            <div class="py-1">
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="set_pagination_number(20)"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">20</a>
                                                                </MenuItem>
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="set_pagination_number(40)"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">40</a>
                                                                </MenuItem>
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="set_pagination_number(60)"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">60</a>
                                                                </MenuItem>
                                                            </div>
                                                        </MenuItems>
                                                    </transition>
                                                </Menu>
                                            </div>
                                            <div class="product__sorting product__show-position ml-20">
                                                <Menu as="div" class="relative inline-block text-left">
                                                    <div>
                                                        <MenuButton
                                                            class="inline-flex w-full justify-center gap-1 items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                                                            {{ sorting_type }}
                                                            <i class="fa-sharp fa-solid fa-chevron-down"></i>
                                                        </MenuButton>
                                                    </div>

                                                    <transition enter-active-class="transition ease-out duration-100"
                                                        enter-from-class="transform opacity-0 scale-95"
                                                        enter-to-class="transform opacity-100 scale-100"
                                                        leave-active-class="transition ease-in duration-75"
                                                        leave-from-class="transform opacity-100 scale-100"
                                                        leave-to-class="transform opacity-0 scale-95">
                                                        <MenuItems
                                                            class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                            <div class="py-1">
                                                                <MenuItem v-slot="{ active }">
                                                                <span
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Sort
                                                                    by...</span>
                                                                </MenuItem>
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="set_sorting_type('Newest')"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Newest</a>
                                                                </MenuItem>
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="set_sorting_type('Price: High to Low')"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Price:
                                                                    High to Low</a>
                                                                </MenuItem>
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="set_sorting_type('Price: Low to High')"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Price:
                                                                    Low to High</a>
                                                                </MenuItem>
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="set_sorting_type('Discount %')"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                                    Discount %</a>
                                                                </MenuItem>
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="set_sorting_type('Oldest')"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Oldest</a>
                                                                </MenuItem>
                                                            </div>
                                                        </MenuItems>
                                                    </transition>
                                                </Menu>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="productGridTabContent">
                            <div class="tab-pane fade"
                                :class="[{ active: layout_product_list }, { show: layout_product_list }]" id="FourCol"
                                role="tabpanel" aria-labelledby="FourCol-tab">
                                <div>
                                    <div v-if="products.data.length > 0" class="row">
                                        <ProductItem v-for="(product, index) in products.data" :key="index"
                                            :product="product" />
                                    </div>
                                    <div v-else>
                                        <div class="col-12 d-flex justify-center my-4">
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">No Product Found!</h4>
                                                <p>Sorry, we couldn't find any product for you.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade"
                                :class="[{ active: !layout_product_list }, { show: !layout_product_list }]" id="FiveCol"
                                role="tabpanel" aria-labelledby="FiveCol-tab">
                                <div class="tp-wrapper-2">
                                    <ProductItemGrid v-for="(product, index) in products.data" :key="index"
                                        :product="product" />

                                </div>
                            </div>
                        </div>

                        <PaginationMarket :links="products.links" />
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-area-end -->
    </main>
</template>

<script setup>
import MarketHeaderLayout from '@/Layouts/MarketHeaderLayout.vue';
import ProductItem from '@/Components/Market/ProductItem.vue';
import SpecialOfferItem from "@/Components/Market/SpecialOfferItem.vue";
import ProductItemGrid from "@/Components/Market/ProductItemGrid.vue";
import MarketCheckBox from "@/Components/Market/CheckBox.vue";
import { useToast } from "vue-toastification";



import { Link, usePage } from '@inertiajs/inertia-vue3';

import { ref } from 'vue';
import RatingCheckBoxStars from '@/Components/Market/RatingCheckBoxStars.vue';
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import PaginationMarket from "@/Components/Market/PaginationMarket.vue";
import { Inertia } from '@inertiajs/inertia';
import ToastNotification from "@/Components/ToastNotification.vue";


const layout_product_list = ref(true);

const pagination_number = ref(usePage().props.value.ziggy?.query?.items ? usePage().props.value.ziggy?.query?.items : 20);

const sorting_type = ref(usePage().props.value.ziggy?.query?.sort_by ? usePage().props.value.ziggy?.query?.sort_by : 'Newest');

const categories_selected = ref(usePage().props.value.ziggy?.query?.category ? usePage().props.value.ziggy?.query?.category : []);

const review_rating = ref(usePage().props.value.ziggy?.query?.rating ? usePage().props.value.ziggy?.query?.rating : []);



const price_range = ref({
    min: usePage().props.value.ziggy?.query?.price?.[0] ? usePage().props.value.ziggy?.query?.price?.[0] : 1,
    max: usePage().props.value.ziggy?.query?.price?.[1] ? usePage().props.value.ziggy?.query?.price?.[1] : 999,
})





const props = defineProps({
    logo: {
        type: String,
        default: null,
        required: false,
    },
    products: {
        type: Object,
        required: true,
    },
    categories: {
        type: Object,
        required: true,
    },
    special_offers: {
        type: Object,
        required: true,
    },
    each_review_avg_count: Object,
    product_count: Number,

});


const toast = useToast();



const set_layout_value_to_true = () => {
    layout_product_list.value = true;
}


const set_layout_value_to_false = () => {
    layout_product_list.value = false;
}

const set_price_range_selected = () => {

    Inertia.get(route('market.shop'), {
        items: pagination_number.value,
        sort_by: sorting_type.value,
        category: usePage().props.value.ziggy?.query?.category ?? [],
        price: [price_range.value.min, price_range.value.max],
        rating: review_rating.value,
        search: usePage().props.value.ziggy?.query?.search ?? [],
    },
        {
            preserveState: true,
        });
}

const set_category_selected = (id) => {
    Inertia.get(route('market.shop'), {
        items: pagination_number.value,
        sort_by: sorting_type.value,
        category: usePage().props.value.ziggy?.query?.category ?? [],
        price: [price_range.value.min, price_range.value.max],
        rating: review_rating.value,
        search: usePage().props.value.ziggy?.query?.search ?? [],
    },
        {
            preserveState: true,
        });
}

const set_pagination_number = (number) => {
    pagination_number.value = number

    Inertia.get(route('market.shop'), {
        items: pagination_number.value,
        sort_by: sorting_type.value,
        category: usePage().props.value.ziggy?.query?.category ?? [],
        price: [price_range.value.min, price_range.value.max],
        rating: review_rating.value,
        search: usePage().props.value.ziggy?.query?.search ?? [],
    },
        {
            preserveState: true,
        });

}

const set_sorting_type = (type) => {


    sorting_type.value = type;

    Inertia.get(route('market.shop'), {
        items: pagination_number.value,
        sort_by: sorting_type.value,
        category: usePage().props.value.ziggy?.query?.category ?? [],
        price: [price_range.value.min, price_range.value.max],
        rating: review_rating.value,
        search: usePage().props.value.ziggy?.query?.search ?? [],
    },
        {
            preserveState: true,
        });
}

const set_rating_selected = () => {
    Inertia.get(route('market.shop'), {
        items: pagination_number.value,
        sort_by: sorting_type.value,
        category: usePage().props.value.ziggy?.query?.category ?? [],
        price: [price_range.value.min, price_range.value.max],
        rating: review_rating.value,
        search: usePage().props.value.ziggy?.query?.search ?? [],
    },
        {
            preserveState: true,
        });
}




</script>



<style lang="scss">

</style>
