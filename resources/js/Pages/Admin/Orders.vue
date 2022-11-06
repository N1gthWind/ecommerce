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
                                        <div class="d-flex flex-wrap align-items-center">

                                            <label for="inputPassword2" class="visually-hidden">Search</label>
                                            <div class="me-3">
                                                <input type="search" v-model="form.search"
                                                    class="form-control my-1 my-lg-0" id="search_email"
                                                    placeholder="Search email...">
                                            </div>
                                            <label for="status-select" class="me-2">Status</label>
                                            <div class="me-sm-3">
                                                <select v-model="form.select" class="form-select my-1 my-lg-0"
                                                    id="status-select">
                                                    <option value="All" selected="">All</option>
                                                    <option value="0">Not Completed</option>
                                                    <option value="1">Paid</option>
                                                </select>
                                            </div>
                                            <label for="status-select" class="mx-2 my-4">Date from:</label>
                                            <div class="me-sm-3">
                                                <input type="date" v-model="form.date_from" class="form-control my-1 my-lg-0" id="datefrom">
                                            </div>

                                            <label for="status-select" class="mx-2 my-4">Date To:</label>
                                            <div class="me-sm-3">
                                                <input type="date" v-model="form.date_to" class="form-control my-1 my-lg-0" id="datefrom">
                                            </div>
                                            <button @click="filterOrders"
                                                class="btn btn-info waves-effect waves-light"><i
                                                    class="mdi mdi-basket me-1"></i>Filter</button>

                                        </div>
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
                                                <th>

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
                                            <OrderListItem :order="order" v-for="(order, index) in props.orders.data"
                                                :key="index" />
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
import { reactive } from 'vue';
import OrderListItem from "@/Components/Admin/Orders/OrderListItem.vue"
import Pagination from "@/Components/Admin/AdminPagination.vue"
import { Inertia } from '@inertiajs/inertia';
import { Link, usePage } from '@inertiajs/inertia-vue3';

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

const form = reactive({
    search: usePage().props.value.ziggy?.query?.search ? usePage().props.value.ziggy?.query?.search : '',
    select: usePage().props.value.ziggy?.query?.select ? usePage().props.value.ziggy?.query?.select : 'All',
    date_from: usePage().props.value.ziggy?.query?.date_from ? usePage().props.value.ziggy?.query?.date_from : '',
    date_to: usePage().props.value.ziggy?.query?.date_to ? usePage().props.value.ziggy?.query?.date_to : '',
})

const filterOrders = () => {

    console.log(form.search);
    Inertia.get(route('admin.orders'), {
        search: form.search,
        status: form.select,
        date_from: form.date_from,
        date_to: form.date_to,
    },
        {
            preserveState: true,
        });
}

</script>

<style lang="scss">

</style>
