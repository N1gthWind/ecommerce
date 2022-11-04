<template>
    <AdminLayout :logo="$page.props.assets.logo" :avatar="$page.props.assets.avatar">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-lg-8">
                                        <form class="d-flex flex-wrap align-items-center">
                                            <label for="inputPassword2" class="visually-hidden">Search</label>
                                            <div class="me-3">
                                                <input type="search" class="form-control my-1 my-lg-0"
                                                    id="inputPassword2" placeholder="Search...">
                                            </div>
                                            <label for="status-select" class="me-2">Status</label>
                                            <div class="me-sm-3">
                                                <select class="form-select my-1 my-lg-0" id="status-select">
                                                    <option selected="">Choose...</option>
                                                    <option value="1">Paid</option>
                                                    <option value="2">Awaiting Authorization</option>
                                                    <option value="3">Payment failed</option>
                                                    <option value="4">Cash On Delivery</option>
                                                    <option value="5">Fulfilled</option>
                                                    <option value="6">Unfulfilled</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="text-lg-end">
                                            <a :href="route('admin.orders.export')"
                                                class="btn btn-light waves-effect">Export</a>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck1">
                                                        <label class="form-check-label"
                                                            for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Order ID</th>
                                                <th>Products</th>
                                                <th>Date</th>
                                                <th>Payment Status</th>
                                                <th>Total</th>
                                                <th>Email</th>
                                                <th class="text-center">Count of bought products:</th>
                                                <th style="width: 125px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <OrderListItem :order="order"
                                                v-for="(order, index) in props.orders.data" :key="index" />
                                        </tbody>
                                    </table>
                                </div>
                                <Pagination class="mt-6" :links="orders.links" />
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
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
    orders: {
        type: Object,
        required: true,
    }
});

</script>

<style lang="scss">

</style>
