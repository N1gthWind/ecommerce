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
                                                <input v-model="form.search" type="search"
                                                    class="form-control my-1 my-lg-0" id="inputPassword2"
                                                    placeholder="Search...">
                                            </div>
                                            <label for="status-select" class="me-2 mt-2">Status</label>
                                            <div class="me-sm-3">
                                                <select v-model="form.select" class="form-select my-1 my-lg-0"
                                                    id="status-select">
                                                    <option :value="[0, 1]" selected>All</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>

                                                </select>
                                            </div>
                                            <button @click="filterCategories"
                                                class="btn btn-info waves-effect waves-light"><i
                                                    class="mdi mdi-basket me-1"></i>Filter</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="text-lg-end">
                                            <Link as="button" :href="route('admin.categories.create')"
                                                class="btn btn-danger waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-basket me-1"></i> Add New Category</Link>
                                            <a type="button" :href="route('admin.categories.export')"
                                                class="btn btn-light waves-effect mb-2">Export</a>
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
                                                <th>Category ID</th>
                                                <th>Category Name</th>
                                                <th>Slug</th>
                                                <th>Status</th>
                                                <th>Meta title</th>
                                                <th>Created date</th>
                                                <th>Updated date</th>

                                                <th style="width: 125px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <CategoryListItem :name="category.name" :id="category.id"
                                                :slug="category.slug" :meta_title="category.meta_title"
                                                :created_at="category.created_at" :updated_at="category.updated_at"
                                                :status="category.status"
                                                v-for="(category, index) in props.categories.data" :key="index" />
                                        </tbody>
                                    </table>
                                </div>
                                <Pagination class="mt-6" :links="categories.links" />
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
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { reactive, ref } from 'vue';
import CategoryListItem from '@/Components/Admin/CategoryListItem.vue';
import Pagination from '@/Components/Admin/AdminPagination.vue';
import { Inertia } from '@inertiajs/inertia';


const form = reactive({
    select: [0, 1],
    search: usePage().props.value.ziggy?.query?.search ? usePage().props.value.ziggy?.query?.search : '',
})


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
    categories: {
        type: Object,
        required: true,
    },
});


const filterCategories = () => {
    Inertia.get(route('admin.categories.index'), { status: form.select, search: form.search }
        , {
            preserveState: true,
        });
}

const exportCategories = () => {
    Inertia.get(route('admin.categories.export'));
}

</script>

<style lang="scss">

</style>
