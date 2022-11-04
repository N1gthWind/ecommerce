<template>
    <tr>
        <td>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck10">
                <label class="form-check-label" for="customCheck10">&nbsp;</label>
            </div>
        </td>
        <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">{{ props.id }}</a>
        </td>
        <td>
            <span>{{ props.name }}</span>
        </td>
        <td>
            <h5>{{ props.slug }}</h5>
        </td>
        <td>
            <span v-if="props.status === 1" class="badge bg-soft-success text-success">Active</span>
            <span v-else class="badge bg-soft-danger text-danger">Inactive</span>
        </td>
        <td>
            {{ props.meta_title }}
        </td>
        <td>
            <h5>{{ props.created_at }}</h5>
        </td>
        <td>
            <h5>{{ props.updated_at }}</h5>
        </td>
        <td>
            <Link :href="route('admin.categories.edit', { category: props.id })" class="action-icon"> <i class="ri-edit-box-line text-lg"></i></Link>
            <Link @click="submitDeleteCategory(props.id)" class="action-icon"> <i class="ri-delete-bin-2-fill text-lg"></i></Link>
        </td>
    </tr>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia'
import { reactive } from 'vue'



const props = defineProps({
    name: String,
    id: Number,
    slug: String,

    status: Number,
    meta_title: String,
    created_at: String,
    updated_at: String,
})

const submitDeleteCategory = (id) => {
    Inertia.delete(route('admin.categories.destroy',  { id: id }));
}
</script>

<style lang="scss">

</style>
