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
                    <button @click="toggle_menu = !toggle_menu" type="button" class="btn button-custom btn-sm px-3 font-size-24 header-item waves-effect"
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

                                            <li class="mm-active">
                                                <Link :href="route('admin.home')" class="waves-effect active"
                                                    aria-expanded="false">
                                                <i class="ri-dashboard-line"></i><span
                                                    class="badge rounded-pill bg-success float-end">3</span>
                                                <span>Dashboard</span>
                                                </Link>
                                            </li>

                                            <li>
                                                <Link :href="route('admin.categories.index')" class="waves-effect">
                                                <i class="ri-list-unordered"></i>
                                                <span>Categories</span>
                                                </Link>
                                            </li>

                                            <li>
                                                <Link :href="route('admin.orders')" class="waves-effect">
                                                <i class="ri-shopping-bag-fill"></i>
                                                <span>Orders</span>
                                                </Link>
                                            </li>

                                            <li>
                                                <Link :href="route('admin.products.index')" class="waves-effect">
                                                <i class="ri-store-fill"></i>
                                                <span>Products</span>
                                                </Link>
                                            </li>

                                            <li>
                                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                    <i class="ri-store-2-line"></i>
                                                    <span>Ecommerce</span>
                                                </a>
                                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                    <li><a href="ecommerce-products.html">Products</a></li>
                                                    <li><a href="ecommerce-product-detail.html">Product Detail</a></li>
                                                    <li><a href="ecommerce-orders.html">Orders</a></li>
                                                    <li><a href="ecommerce-customers.html">Customers</a></li>
                                                    <li><a href="ecommerce-cart.html">Cart</a></li>
                                                    <li><a href="ecommerce-checkout.html">Checkout</a></li>
                                                    <li><a href="ecommerce-shops.html">Shops</a></li>
                                                    <li><a href="ecommerce-add-product.html">Add Product</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                    <i class="ri-mail-send-line"></i>
                                                    <span>Email</span>
                                                </a>
                                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                    <li><a href="email-inbox.html">Inbox</a></li>
                                                    <li><a href="email-read.html">Read Email</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="apps-kanban-board.html" class="waves-effect">
                                                    <i class="ri-artboard-2-line"></i>
                                                    <span>Kanban Board</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                    <i class="ri-layout-3-line"></i>
                                                    <span>Layouts</span>
                                                </a>
                                                <ul class="sub-menu mm-collapse" aria-expanded="true">
                                                    <li>
                                                        <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                                            <li><a target="_self"
                                                                    href="layouts-light-sidebar.html">Light Sidebar</a>
                                                            </li>
                                                            <li><a target="_self"
                                                                    href="layouts-compact-sidebar.html">Compact
                                                                    Sidebar</a>
                                                            </li>
                                                            <li><a target="_self" href="layouts-icon-sidebar.html">Icon
                                                                    Sidebar</a></li>
                                                            <li><a target="_self" href="layouts-boxed.html">Boxed
                                                                    Width</a></li>
                                                            <li><a target="_self"
                                                                    href="layouts-preloader.html">Preloader</a></li>
                                                            <li><a target="_self"
                                                                    href="layouts-colored-sidebar.html">Colored
                                                                    Sidebar</a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                                                        <ul class="sub-menu mm-collapse" aria-expanded="true">
                                                            <li><a target="_self"
                                                                    href="layouts-horizontal.html">Horizontal</a></li>
                                                            <li><a target="_self"
                                                                    href="layouts-hori-topbar-light.html">Topbar
                                                                    light</a>
                                                            </li>
                                                            <li><a target="_self"
                                                                    href="layouts-hori-boxed-width.html">Boxed width</a>
                                                            </li>
                                                            <li><a target="_self"
                                                                    href="layouts-hori-preloader.html">Preloader</a>
                                                            </li>
                                                            <li><a target="_self"
                                                                    href="layouts-hori-colored-header.html">Colored
                                                                    Header</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="menu-title">Pages</li>

                                            <li>
                                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                    <i class="ri-account-circle-line"></i>
                                                    <span>Authentication</span>
                                                </a>
                                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                    <li><a target="_self" href="auth-login.html">Login</a></li>
                                                    <li><a target="_self" href="auth-register.html">Register</a></li>
                                                    <li><a target="_self" href="auth-recoverpw.html">Recover
                                                            Password</a></li>
                                                    <li><a target="_self" href="auth-lock-screen.html">Lock Screen</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <Link :href="route('logout')" method="post" class="waves-effect">
                                                <i class="ri-shut-down-line"></i>
                                                <span>Log out</span>
                                                </Link>
                                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                                    <li><a target="_self" href="pages-maintenance.html">Maintenance</a>
                                                    </li>
                                                    <li><a target="_self" href="pages-comingsoon.html">Coming Soon</a>
                                                    </li>
                                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                                    <li><a href="pages-faqs.html">FAQs</a></li>
                                                    <li><a href="pages-pricing.html">Pricing</a></li>
                                                    <li><a target="_self" href="pages-404.html">Error 404</a></li>
                                                    <li><a target="_self" href="pages-500.html">Error 500</a></li>
                                                </ul>
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
