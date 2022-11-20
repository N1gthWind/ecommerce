<template>
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img :src="props.logo" alt="logo-sm-dark" height="22">
                            </span>
                            <span class="logo-lg">
                                <img :src="props.logo" alt="logo-dark" height="20">
                            </span>
                        </a>

                        <Link :href="route('admin.home')" class="logo logo-light">
                        <span class="logo-sm">
                            <img :src="props.logo" alt="logo-sm-light" height="22">
                        </span>
                        <span class="logo-lg">
                            <img :src="props.logo" alt="logo-light" height="20">
                        </span>
                        </Link>
                    </div>
                    <button @click="toggle_menu = !toggle_menu" type="button"
                        class="btn button-custom btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>
                </div>

                <div class="d-flex">


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-notification-3-line"></i>
                            <!-- <span class="noti-dot"></span> -->
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar="init" style="max-height: 230px;">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper"
                                                style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <a href="" class="text-reset notification-item">
                                                        <div class="d-flex">
                                                            <div class="avatar-xs me-3">
                                                                <span
                                                                    class="avatar-title bg-primary rounded-circle font-size-16">
                                                                    <i class="ri-shopping-cart-line"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-1">
                                                                <h6 class="mt-0 mb-1">Your order is placed</h6>
                                                                <div class="font-size-12 text-muted">
                                                                    <p class="mb-1">If several languages coalesce the
                                                                        grammar</p>
                                                                    <p class="mb-0"><i
                                                                            class="mdi mdi-clock-outline"></i> 3 min ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="" class="text-reset notification-item">
                                                        <div class="d-flex">
                                                            <img :src="props.avatar"
                                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                            <div class="flex-1">
                                                                <h6 class="mt-0 mb-1">James Lemire</h6>
                                                                <div class="font-size-12 text-muted">
                                                                    <p class="mb-1">It will seem like simplified
                                                                        English.</p>
                                                                    <p class="mb-0"><i
                                                                            class="mdi mdi-clock-outline"></i> 1 hours
                                                                        ago</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="" class="text-reset notification-item">
                                                        <div class="d-flex">
                                                            <div class="avatar-xs me-3">
                                                                <span
                                                                    class="avatar-title bg-success rounded-circle font-size-16">
                                                                    <i class="ri-checkbox-circle-line"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-1">
                                                                <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                                                <div class="font-size-12 text-muted">
                                                                    <p class="mb-1">If several languages coalesce the
                                                                        grammar</p>
                                                                    <p class="mb-0"><i
                                                                            class="mdi mdi-clock-outline"></i> 3 min ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>

                                                    <a href="" class="text-reset notification-item">

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar"
                                        style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar"
                                        style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                </div>
                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block user-dropdown">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" :src="props.avatar" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1">{{ $page.props.auth.user.name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                            <Link :href="route('logout')" method="post" class="dropdown-item text-danger">
                            <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
                            Logout
                            </Link>
                        </div>
                    </div>



                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div :style="[toggle_menu ? 'display: block;' : '']" class="vertical-menu">

            <div data-simplebar="init" class="h-100">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper mm-active" style="height: 100%; overflow: hidden;">
                                <div class="simplebar-content mm-show" style="padding: 0px;">

                                    <!--- Sidemenu -->
                                    <div id="sidebar-menu" class="mm-active">
                                        <!-- Left Menu Start -->
                                        <ul class="metismenu list-unstyled mm-show" id="side-menu">
                                            <li class="menu-title">Menu</li>

                                            <li :class="{ 'mm-active' : route().current('admin.home') }">
                                                <Link :href="route('admin.home')" class="waves-effect" :class="{'active': route().current('admin.home') }"
                                                    aria-expanded="false">
                                                <i class="ri-dashboard-line"></i>
                                                <span>Dashboard</span>
                                                </Link>
                                            </li>

                                            <li :class="{ 'mm-active' : route().current('admin.categories.index') }">
                                                <Link :href="route('admin.categories.index')" class="waves-effect" :class="{ 'active' : route().current('admin.categories.index') }">
                                                <i class="ri-list-unordered"></i>
                                                <span>Categories</span>
                                                </Link>
                                            </li>

                                            <li :class="{ 'mm-active' : route().current('admin.orders') }">
                                                <Link :href="route('admin.orders')" class="waves-effect" :class="{ 'active' : route().current('admin.orders') }">
                                                <i class="ri-shopping-bag-fill"></i>
                                                <span>Orders</span>
                                                </Link>
                                            </li>

                                            <li :class="{ 'mm-active' : route().current('admin.products.index') }">
                                                <Link :href="route('admin.products.index')" class="waves-effect" :class="{ 'active' : route().current('admin.products.index') }">
                                                <i class="ri-store-fill"></i>
                                                <span>Products</span>
                                                </Link>
                                            </li>


                                            <li>
                                                <Link :href="route('logout')" method="post" class="waves-effect">
                                                <i class="ri-shut-down-line"></i>
                                                <span>Log out</span>
                                                </Link>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Sidebar -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 877px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;">
                    </div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                        style="height: 897px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content" id="result">
            <slot />
        </div>
        <!-- end main content-->

    </div>
</template>

<script setup>
import { ShoppingBagIcon } from '@heroicons/vue/24/solid';
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

const toggle_menu = ref(false);

const props = defineProps({
    logo: {
        type: String,
        default: null,
        required: false,
    },
    avatar: {
        type: String,
        default: null,
        required: true,
    }
});

</script>

<style lang="scss">

</style>
