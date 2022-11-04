<template>
    <header class="header d-custom-dark-bg">
        <div class="header-top">
            <div class="container">
                <div class="header-inner">
                </div>
            </div>
        </div>
        <div class="header-mid">
            <div class="container-fluid">
                <div class="heade-mid-inner">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                            <div class="header__info">
                                <div class="logo">
                                    <Link :href="route('market.home')" class="logo-image contents"><img height="80"
                                        class="h-20" :src="props.logo" alt="logo"></Link>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="header__search">
                                <form @submit.prevent="search_product">
                                    <div class="header__search-box">
                                        <input class="search-input" v-model="search_input" type="text"
                                            placeholder="I'm shopping for...">
                                        <button class="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8">
                            <div class="header-action">
                                <div v-if="!$page?.props?.auth?.user" class="block-userlink">
                                    <Link :href="route('login')" class="icon-link">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="text">
                                        <span class="sub">Login </span>
                                        My Account </span>
                                    </Link>
                                </div>
                                <div class="block-wishlist action">
                                    <Link :href="route('wishlist.index')" class="icon-link">
                                    <i class="fa-solid fa-heart"></i>
                                    <span class="count">{{ wishlists_count }}</span>
                                    <span class="text">
                                        <span class="sub">Favorite</span>
                                        My Wishlist </span>
                                    </Link>
                                </div>
                                <div class="block-cart action">
                                    <Link class="icon-link" :href="route('cart.index')">
                                    <ShoppingBagIcon style="color: white; width: 34px;" />
                                    <span class="count">{{ $page.props.auth.cart_count ? $page.props.auth.cart_count : 0
                                    }}</span>
                                    <span class="text">
                                        <span class="sub">Your Cart:</span>
                                        ${{ $page.props.auth.cart_total_price ? $page.props.auth.cart_total_price :
                                                '00.00'
                                        }}</span>
                                    </Link>
                                </div>
                                <div v-if="$page?.props?.auth?.user" class="block-cart action">


                                    <Dropdown>
                                        <template #trigger>
                                            <UserCircleIcon @click="toggleAccountMenu"
                                                style="color: white; width: 34px; cursor:pointer;" />
                                        </template>
                                        <template #content>
                                            <Link :href="route('logout')" method="post"
                                                class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="menu-item-0">Logout</Link>
                                        </template>
                                    </Dropdown>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bottom">
            <div class="container">
                <div class="row gap-4 align-items-center">
                    <div class="col-lg-3">
                        <div class="cat__menu-wrapper side-border d-block d-lg-block ">
                            <div class="cat-toggle">
                                <button @click="toggleShopByDepartmant" type="button"
                                    class="cat-toggle-btn cat-toggle-btn-1 w-full"><i
                                        class="fa-sharp fa-solid fa-bars"></i>
                                    Shop by category</button>
                                <div class="cat__menu"
                                    :style="[shop_by_departmant ? 'display: block;' : 'display: none;']">
                                    <nav id="mobile-menu" style="display: block;">
                                        <ul>
                                            <li :class="{ 'active': categories_selected == null }">
                                                <Link @click="set_category([])">
                                                All Categories</Link>
                                            </li>
                                            <li :class="{ 'active': categories_selected == category.id }"
                                                v-for="(category, index) in categories" :key="index">
                                                <Link @click="set_category(category.id)">{{
                                                        category.name
                                                }}</Link>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-3 col-sm-12">
                        <div class="header__bottom-left d-flex d-xl-block align-items-center">
                            <div class="side-menu d-lg-none mr-20">
                                <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i
                                        class="fas fa-bars"></i></button>
                            </div>
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul>
                                        <li>
                                            <Link :href="route('market.home')">Home</Link>
                                        </li>
                                        <li>
                                            <Link :href="route('market.shop')">Shop</Link>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import { ShoppingBagIcon } from '@heroicons/vue/24/solid';
import { UserCircleIcon } from '@heroicons/vue/24/solid';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import { Inertia } from "@inertiajs/inertia";
import Dropdown from "@/Components/Dropdown.vue";



const props = defineProps({
    logo: {
        type: String,
        default: null,
        required: false,
    },
    categories: {
        type: Object,
        required: true,
    },
    wishlists_count: {
        type: Number,
        required: false,
        default: 0,
    }
});

const language_select = ref(false);
const currency_select = ref(false);

const category_select = ref(false);
const shop_by_departmant = ref(false);
const account_menu_is_open = ref(false);


const pagination_number = ref(usePage().props.value.ziggy?.query?.items ? usePage().props.value.ziggy?.query?.items : 20);

const sorting_type = ref(usePage().props.value.ziggy?.query?.sort_by ? usePage().props.value.ziggy?.query?.sort_by : 'Newest');

const categories_selected = ref(usePage().props.value.ziggy?.query?.category ? usePage().props.value.ziggy?.query?.category : []);

const review_rating = ref(usePage().props.value.ziggy?.query?.rating ? usePage().props.value.ziggy?.query?.rating : []);

const search_input = ref(usePage().props.value.ziggy?.query?.search ? usePage().props.value.ziggy?.query?.search : '');

const price_range = ref({
    min: usePage().props.value.ziggy?.query?.price?.[0] ? usePage().props.value.ziggy?.query?.price?.[0] : 1,
    max: usePage().props.value.ziggy?.query?.price?.[1] ? usePage().props.value.ziggy?.query?.price?.[1] : 999,
})

const set_category = (category) => {
    categories_selected.value = category;

    shop_by_departmant.value = !shop_by_departmant.value

    Inertia.get(route('market.shop'), {
        items: pagination_number.value,
        sort_by: sorting_type.value,
        category: categories_selected.value,
        price: [price_range.value.min, price_range.value.max],
        rating: review_rating.value,
    },
        {
            preserveState: true,
        });

}

const search_product = () => {

    Inertia.get(route('market.shop'), {
        items: pagination_number.value,
        sort_by: sorting_type.value,
        category: categories_selected.value,
        price: [price_range.value.min, price_range.value.max],
        rating: review_rating.value,
        search: search_input.value,
    },
        {
            preserveState: true,
        });
}


const toggleLanguageSelect = () => {
    language_select.value = !language_select.value
}

const toggleCurrencySelect = () => {
    currency_select.value = !currency_select.value

}

const toggleCategorySelect = () => {
    category_select.value = !category_select.value
}

const toggleShopByDepartmant = () => {
    shop_by_departmant.value = !shop_by_departmant.value
}

const toggleAccountMenu = () => {
    account_menu_is_open.value = !account_menu_is_open.value;

}

</script>

<style lang="scss">

</style>
