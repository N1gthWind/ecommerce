<script setup>

import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';


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
    orders_count: {
        type: Number,
        required: true,
    },
    users_count: {
        type: Number,
        required: true,
    },
    products_count: {
        type: Number,
        required: true,
    },
    not_completed_orders: {
        type: Number,
        required: true,
    },
});

</script>

<template>
    <AdminLayout :logo="$page.props.assets.logo" :avatar="$page.props.assets.avatar">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <!-- Card group -->
                        <div class="card-group">

                            <!-- Card -->
                            <div class="card mb-4">

                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Title -->
                                    <h6 class="card-title">Users:</h6>
                                    <!-- Text -->


                                    <p class="card-text blue-text"><i class="fas fa-user fa-2x"></i><span
                                            class="ml-2" style="font-size: 30px;">{{ users_count }}</span></p>

                                </div>
                                <!-- Card content -->

                            </div>
                            <!-- Card -->

                            <!-- Card -->
                            <div class="card mb-4">

                                <!-- Card content -->
                                <div class="card-body">
                                    <!-- Title -->
                                    <h6 class="card-title">Products: </h6>
                                    <!-- Text -->
                                    <p class="card-text red-text">
                                        <i class="fas fa-box fa-2x"></i>
                                        <span class="ml-2" style="font-size: 30px;">{{ products_count }}</span>
                                    </p>
                                </div>
                                <!-- Card content -->

                            </div>
                            <!-- Card -->

                        </div>
                        <!-- Card group -->
                    </div>



                    <div class="col-6">
                        <!-- Card group -->
                        <div class="card-group">

                            <!-- Card -->
                            <div class="card mb-4">

                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Title -->
                                    <h6 class="card-title">Orders:</h6>
                                    <!-- Text -->


                                    <p class="card-text green-text"><i class="fas fa-bag-shopping fa-2x"></i><span
                                            class="ml-2" style="font-size: 30px;">{{ orders_count }}</span></p>

                                </div>
                                <!-- Card content -->

                            </div>
                            <!-- Card -->

                            <!-- Card -->
                            <div class="card mb-4">

                                <!-- Card content -->
                                <div class="card-body">
                                    <!-- Title -->
                                    <h6 class="card-title">Not completed orders: </h6>
                                    <!-- Text -->
                                    <p class="card-text red-text"><i class="fas fa-bag-shopping fa-2x"></i><span
                                            class="ml-2" style="font-size: 30px;">{{ not_completed_orders }}</span></p>

                                </div>
                                <!-- Card content -->

                            </div>
                            <!-- Card -->

                        </div>
                        <!-- Card group -->
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<style>

</style>
