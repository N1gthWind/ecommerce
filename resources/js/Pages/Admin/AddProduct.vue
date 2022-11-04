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
                                <h4 class="page-title mt-4">Add Product</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <span v-if="$page.props.flash.success" class="text-success">{{
                                    $page.props.flash.success }}</span>

                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                                    <div class="mb-3">
                                        <label for="product-name" class="form-label">Product Name <span
                                                class="text-danger">*</span></label>
                                        <input v-model="form.name" type="text" id="product-name" class="form-control"
                                            placeholder="Enter name">

                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="product-reference" class="form-label">Product slug <span
                                                class="text-danger">*</span></label>
                                        <input v-model="form.slug" type="text" id="product-slug" class="form-control"
                                            placeholder="Enter slug">

                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.slug" />

                                    </div>

                                    <div class="mb-3">
                                        <label for="product-summary" class="form-label">Product Description</label>
                                        <textarea v-model="form.description" class="form-control" id="product-desc"
                                            rows="3" placeholder="Please enter summary"></textarea>

                                        <InputError class="mt-2 text-danger"
                                            :message="$page.props.errors.description" />
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

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>

                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Default file
                                            input</label>
                                        <input type="file" id="example-fileinput" class="form-control">
                                    </div>

                                    <div
                                        class="upload-product-media d-flex justify-content-between align-items-center mt-25">
                                        <div class="upload-media-area d-flex" style="width: 100%;">
                                            <img src="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/img/food-restaurant-media.png" alt="img">
                                            <div
                                                class="upload-media-area__title  d-flex flex-wrap align-items-center ml-10" style="justify-content: space-between;width: 100%;">
                                                <div class="m-4">
                                                    <p>Product_image.jpg</p>
                                                    <span>68.8 KB</span>
                                                </div>
                                                <div class="upload-media-area__btn" style="">
                                                    <button type="button" style="background: transparent;"
                                                        class="transparent rounded-circle wh-30 border-0 color-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Meta Data</h5>

                                    <div class="mb-3">
                                        <label for="product-meta-title" class="form-label">Meta title</label>
                                        <input v-model="form.meta_title" type="text" class="form-control"
                                            id="product-meta-title" placeholder="Enter title">
                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.meta_title" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="product-meta-keywords" class="form-label">Meta Keywords</label>
                                        <input v-model="form.meta_keywords" type="text" class="form-control"
                                            id="product-meta-keywords" placeholder="Enter keywords">

                                        <InputError class="mt-2 text-danger"
                                            :message="$page.props.errors.meta_keywords" />
                                    </div>

                                    <div>
                                        <label for="product-meta-description" class="form-label">Meta Description
                                        </label>
                                        <textarea v-model="form.meta_desc" class="form-control" rows="5"
                                            id="product-meta-description"
                                            placeholder="Please enter description"></textarea>

                                        <InputError class="mt-2 text-danger"
                                            :message="$page.props.errors.meta_keywords" />

                                    </div>
                                </div>
                            </div> <!-- end card -->

                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <button @click="submitproduct" type="button"
                                    class="btn w-sm btn-success waves-effect waves-light">Create
                                    product</button>
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
const form = reactive({
    name: '',
    slug: '',
    description: '',
    status: 1,
    meta_title: '',
    meta_desc: '',
    meta_keywords: '',


});
const toast = useToast();

const submitproduct = () => {
    Inertia.post(route('admin.products.store'), form);
}

</script>

<style lang="scss">

</style>
