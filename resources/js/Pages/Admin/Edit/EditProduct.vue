<template>
    <ToastNotificationStatus />
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
                                <h4 class="page-title mt-4">Edit Product</h4>
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
                                        <label for="product-name" class="form-label">Product Name <span
                                                class="text-danger">*</span></label>
                                        <input v-model="form.name" type="text" id="product-name" class="form-control"
                                            placeholder="Enter name">
                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="product-slug" class="form-label">Product slug <span
                                                class="text-danger">*</span></label>
                                        <input v-model="form.slug" type="text" id="product-slug" class="form-control"
                                            placeholder="Enter slug">

                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.slug" />

                                    </div>

                                    <div class="mb-3">
                                        <label for="product-price" class="form-label">Price<span
                                                class="text-danger">*</span></label>
                                        <input v-model="form.price" type="text" id="product-price" class="form-control"
                                            placeholder="Enter price">

                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.price" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="product-discount_price" class="form-label">Discount Price</label>
                                        <input v-model="form.discount_price" type="text" id="product-discount_price"
                                            class="form-control" placeholder="Enter discount price">

                                        <InputError class="mt-2 text-danger"
                                            :message="$page.props.errors.discount_price" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="product-quantity" class="form-label">Quantity<span
                                                class="text-danger">*</span></label>
                                        <input v-model="form.quantity" type="text" id="product-quantity"
                                            class="form-control" placeholder="Enter name">

                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.quantity" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="product-description" class="form-label">Product Description</label>
                                        <textarea v-model="form.description" class="form-control"
                                            id="product-description" rows="3"
                                            placeholder="Please enter summary"></textarea>

                                        <InputError class="mt-2 text-danger"
                                            :message="$page.props.errors.description" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                                        <br>

                                        <div class="d-flex flex-wrap">
                                            <div class="form-check me-2">
                                                <input v-model="form.status" class="form-check-input" type="radio"
                                                    name="product-status1" :value="1" id="product-status1">
                                                <label class="form-check-label" for="product-status1">Active</label>
                                            </div>
                                            <div class="form-check me-2">
                                                <input v-model="form.status" class="form-check-input" type="radio"
                                                    name="product-status2" :value="0" id="product-status2">
                                                <label class="form-check-label" for="product-status1">Inactive</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">

                                            <label class="my-2">Trending <span class="text-danger">*</span></label>
                                            <br>

                                            <div class="d-flex flex-wrap">
                                                <div class="form-check me-2">
                                                    <input v-model="form.trending" class="form-check-input" type="radio"
                                                        name="radioInline" :value="1" id="product_trending1" checked="">
                                                    <label class="form-check-label" for="product_trending1">Yes</label>
                                                </div>
                                                <div class="form-check me-2">
                                                    <input v-model="form.trending" class="form-check-input" type="radio"
                                                        name="radioInline" :value="0" id="product_trending2">
                                                    <label class="form-check-label" for="product_trending2">No</label>

                                                    <InputError class="mt-2 text-danger"
                                                        :message="$page.props.errors.trending" />
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div> <!-- end card -->

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>

                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Default file
                                            input</label>
                                        <input @change="onFileChange" type="file" id="example-fileinput"
                                            class="form-control" multiple>
                                    </div>

                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>

                                    <div v-for="(image, index) in images" :key="index"
                                        class="upload-product-media mt-3">
                                        <div class="upload-media-area d-flex">
                                            <img :src="image?.image" alt="img" width="200">
                                            <div class="upload-media-area__title  d-flex flex-wrap align-items-center ml-10"
                                                style="justify-content: space-between;width: 100%;">
                                                <div class="m-4">
                                                    <p>{{ image?.name }}</p>
                                                    <span>{{ image?.size.toFixed(2) }} MB</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div v-for="(image, index) in $page?.props?.errors?.images" :key="index">
                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.images" />
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Relations</h5>

                                    <div class="mb-3">
                                        <label for="product-meta-title" class="form-label">Meta title</label><span
                                            class="text-danger">*</span>
                                        <input v-model="form.meta_title" type="text" class="form-control"
                                            id="product-meta-title" placeholder="Enter title">
                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.meta_title" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="product-category" class="form-label">Category<span
                                                class="text-danger">*</span></label>
                                        <select v-model="form.category" class="form-select my-1 my-lg-0"
                                            id="product-category">
                                            <option v-for="(category, index) in categories" :key="index"
                                                :value="category.id">{{ category.name }}</option>

                                        </select>

                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.category" />
                                    </div>


                                    <div class="mb-3">
                                        <label for="product-brand" class="form-label">Brand<span
                                                class="text-danger">*</span></label>
                                        <select v-model="form.brand" class="form-select my-1 my-lg-0"
                                            id="product-brand">
                                            <option v-for="(brand, index) in brands" :key="index" :value="brand.id">{{
                                                    brand.name
                                            }}</option>

                                        </select>

                                        <InputError class="mt-2 text-danger" :message="$page.props.errors.category" />
                                    </div>



                                </div>
                            </div> <!-- end card -->

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Images</h5>

                                    <div class="mb-3">
                                        <div class="row">
                                            <div v-for="(media, index) in product?.media" :key="index"
                                                class="col-xl-6 col-sm-6">
                                                <div class="card border border-primary">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <img v-if="media?.original_url" :src="media?.original_url"
                                                                class="avatar-xl mt-2 mb-4" :alt="media?.name">
                                                            <img v-else :src="$page.props.assets.no_image_product"
                                                                :alt="media?.name" class="mt-2 mb-4 w-full h-full" />
                                                            <div class="flex-1">
                                                                <h5 class="text-truncate"><a href="#"
                                                                        class="text-dark">{{ media.name }}</a>
                                                                </h5>
                                                                <p class="text-muted">
                                                                    <i class="mdi mdi-account me-1"></i> {{
                                                                            media.mime_type
                                                                    }}
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
                                                                <h5>{{ media.size > 0 ? ((media.size / 1024) /
                                                                        1024).toFixed(2) + " MB" : ''
                                                                }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <button @click="editProduct" type="button"
                                    class="btn w-sm btn-success waves-effect waves-light">Edit Product</button>
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
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { onMounted, onUpdated, reactive } from 'vue'
import InputError from "@/Components/InputError.vue";
import { useToast } from "vue-toastification";
import { usePage, useForm } from '@inertiajs/inertia-vue3';
import ToastNotificationStatus from "@/Components/Admin/ToastNotificationStatus.vue";
import { ref } from 'vue';
const images = ref([]);

const toast = useToast();


const props = defineProps({
    product: {
        type: Object,
        required: true
    },
    categories: {
        type: Object,
        required: true,
    },
    brands: {
        type: Object,
        required: true,
    }
});

const form = useForm({
    name: props.product.name,
    description: props.product.description,
    slug: props.product.slug,
    price: props.product.price,
    discount: props.product.discount,
    quantity: props.product.quantity,
    meta_title: props.product.meta_title,
    category: props.product?.category_id,
    brand: props.product?.brand_id,
    status: props.product.status,
    trending: props.product.trending,
    images: [],
});


const editProduct = () => {
    Inertia.post(route('admin.products.update', { product: props.product.id, _method: 'put' }), form);
}

const onFileChange = (e) => {
    images.value = [];
    form.images = [];
    let is_valid = true;
    var files = e.target.files || e.dataTransfer.files
    if (!files.length) {
        return
    }
    Array.from(files).forEach(file => {

        if (file.type.match(['image.*'])) {
            const size = file.size > 0 ? ((file.size / 1024) / 1024) : 0;
            const name = file.name;

            var reader = new FileReader()
            reader.onload = (e) => {
                const image = e.target.result;

                images.value.push({
                    image: image,
                    size: size,
                    name: name,
                });
            }
            reader.readAsDataURL(file)
        }
        else {
            is_valid = false;
        }
    });

    if (is_valid) {
        form.images = files;
    }
}


</script>
