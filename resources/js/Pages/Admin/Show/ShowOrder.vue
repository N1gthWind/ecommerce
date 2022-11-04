<template>
    <AdminLayout :logo="$page.props.assets.logo" :avatar="$page.props.assets.avatar">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div v-for="(product, index) in order.products" :key="index" class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img v-if="product?.media[0]?.original_url" :src="product?.media[0]?.original_url"
                                        class="avatar-sm mt-2 mb-4" :alt="product.meta_title">
                                    <img v-else :src="$page.props.assets.no_image_product" :alt="product.meta_title"
                                        class="avatar-sm mt-2 mb-4" />
                                    <div class="flex-1">
                                        <h5 class="text-truncate"><a href="#" class="text-dark">{{ product.name }}</a>
                                        </h5>
                                        <p class="text-muted">
                                            <i class="mdi mdi-account me-1"></i> {{ product.category.name }}
                                        </p>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="row text-center">
                                    <div class="col-6">
                                        <p class="text-muted mb-2">Quantity</p>
                                        <h5>{{ product.pivot.quantity }}</h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-muted mb-2">Price</p>
                                        <h5>${{ product.pivot.price }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2>User Information:</h2>

                                <p>Created: {{ order.user.created_at }}</p>
                                <p>Email: {{  order.user.email }}</p>
                                <p>Email Verified date: {{  order?.user.email_verified_at }}</p>
                                <p>ID: {{  order.user.id }}</p>
                                <p>Name: {{  order.user.name }}</p>
                                <p>Role: {{  order.user.role }}</p>
                                <p>Updated last date: {{  order.user.updated_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import OrderListItem from "@/Components/Admin/Orders/OrderListItem.vue"
import Pagination from "@/Components/Admin/AdminPagination.vue"
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
    },
    order: {
        type: Object,
        required: true,
    },
});

</script>

<style lang="scss">

</style>

