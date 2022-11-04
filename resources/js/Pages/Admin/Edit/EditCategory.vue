<template>
    <AdminLayout :logo="$page.props.assets.logo" :avatar="$page.props.assets.avatar">
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">

                                </div>
                                <h4 class="page-title mt-4">Edit Category</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <span v-if="$page.props.flash.success" class="text-success">{{
                                            $page.props.flash.success
                                    }}</span>

                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                                    <div class="mb-3">
                                        <label for="category-name" class="form-label">Category Name <span
                                                class="text-danger">*</span></label>
                                        <input v-model="form.name" type="text" id="category-name" class="form-control"
                                            placeholder="Enter name">

                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="category-reference" class="form-label">Category slug <span
                                                class="text-danger">*</span></label>
                                        <input v-model="form.slug" type="text" id="category-slug" class="form-control"
                                            placeholder="Enter slug">

                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.slug" />

                                    </div>


                                    <div class="mb-3">
                                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                                        <br>


                                        <div class="d-flex flex-wrap">
                                            <div class="form-check me-2">
                                                <input v-model="form.status" class="form-check-input" type="radio"
                                                    name="radioInline" :value="1" id="inlineRadio1" checked="">
                                                <label class="form-check-label" for="inlineRadio1">Active</label>
                                            </div>
                                            <div class="form-check me-2">
                                                <input v-model="form.status" class="form-check-input" type="radio"
                                                    name="radioInline" :value="0" id="inlineRadio2">
                                                <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                            </div>
                                        </div>
                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.status" />
                                    </div>
                                </div>
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Meta Data</h5>

                                    <div class="mb-3">
                                        <label for="category-meta-title" class="form-label">Meta title</label>
                                        <input v-model="form.meta_title" type="text" class="form-control"
                                            id="category-meta-title" placeholder="Enter title">
                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.meta_title" />
                                    </div>


                                </div>
                            </div> <!-- end card -->

                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <button @click="submitCategory" type="button"
                                    class="btn w-sm btn-success waves-effect waves-light">Edit
                                    category</button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->


                    <!-- file preview template -->
                    <div class="d-none" id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img data-dz-thumbnail="" src="#" class="avatar-sm rounded bg-light" alt="">
                                    </div>
                                    <div class="col ps-0">
                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name=""></a>
                                        <p class="mb-0" data-dz-size=""></p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove="">
                                            <i class="dripicons-cross"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{ new Date().getFullYear() }}© UBold theme by <a href="">Coderthemes</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { onMounted, onUpdated, reactive } from 'vue'
import InputError from "@/Components/InputError.vue";
import { useToast } from "vue-toastification";
import { usePage } from '@inertiajs/inertia-vue3'

const props = defineProps({
    category: {
        type: Object,
        required: true,
    }
})

const form = reactive({
    name: props.category.name,
    slug: props.category.slug,
    status: props.category.status,
    meta_title: props.category.meta_title,
    meta_desc: '',
    meta_keywords: '',


});


const submitCategory = () => {
    Inertia.put(route('admin.categories.update', { category: props.category.id }), form);
}

</script>

<style lang="scss">

</style>
