<template>
    <AdminLayout :logo="$page.props.assets.logo" :avatar="$page.props.assets.avatar">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div v-for="(media, index) in product.media" :key="index" class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img v-if="media?.original_url" :src="media?.original_url"
                                        class="avatar-xl mt-2 mb-4" :alt="media?.name">
                                    <img v-else :src="$page.props.assets.no_image_product" :alt="media?.name"
                                        class="mt-2 mb-4 w-full h-full" />
                                    <div class="flex-1">
                                        <h5 class="text-truncate"><a href="#" class="text-dark">{{ media.name }}</a>
                                        </h5>
                                        <p class="text-muted">
                                            <i class="mdi mdi-account me-1"></i> {{ media.mime_type }}
                                        </p>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <p class="text-muted mb-2">ID:</p>
                                        <h5>{{ media.id }}</h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-muted mb-2">Size:</p>
                                        <h5>{{ media.size > 0 ? ((media.size / 1024) / 1024).toFixed(2) + " MB" : '' }}
                                        </h5>
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
                                <h2>Product Information:</h2>
                                <p>Id : {{ product.id }}</p>
                                <p>Category_id : {{ product.category_id }}</p>
                                <p>Name : {{ product.name }}</p>
                                <p>Slug : {{ product.slug }}</p>
                                <p>Brand_id : {{ product.brand_id }}</p>
                                <p>Description : {{ product.description }}</p>
                                <p>Quantity : {{ product.quantity }}</p>
                                <p>Price : ${{ product.price }}</p>
                                <p>Discount_price : ${{ product.discount_price ? product.discount_price : '' }}</p>
                                <p>Status : {{ product.status }}</p>
                                <p>Trending : {{ product.trending }}</p>
                                <p>Meta_title  : {{ product.meta_title }}</p>
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

import Pagination from "@/Components/Admin/AdminPagination.vue"
const props = defineProps({
    product: {
        type: Object,
        required: true,
    },
});

</script>

<style lang="scss">

</style>

