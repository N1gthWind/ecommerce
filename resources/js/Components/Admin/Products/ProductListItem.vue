<template>
    <tr>
        <td>
            <span>{{ props.product?.id }}</span>
        </td>
        <td>
            <span>{{ props.product?.category.name }}</span>
        </td>
        <td>
            <span>{{ props.product?.name }}</span>
        </td>
        <td>
            <span>{{ props.product?.slug }}</span>
        </td>
        <td>
            <span>{{ props.product?.brand?.name }}</span>
        </td>
        <td>
            <span>{{ props.product?.description.substring(0, 20) + "..." }}</span>
        </td>
        <td>
            <span>{{ props.product?.quantity }}</span>
        </td>
        <td>
            <span>{{ props.product?.status }}</span>
        </td>
        <td>
            <span>{{ Object.keys(props.product?.media).length }}</span>
        </td>
        <td>
            <span>{{ props.product?.trending }}</span>
        </td>
        <td>
            <span>{{ props.product?.meta_title.substring(0, 20) + "..." }}</span>
        </td>
        <td>
            <Link :href="route('admin.products.show', { product: props.product?.id })" class="action-icon"> <i
                class="ri-eye-fill text-lg"></i></Link>
            <Link :href="route('admin.products.edit', { product: props.product?.id })" class="action-icon"> <i class="ri-edit-box-line text-lg"></i></Link>
            <Link @click="submitDeleteCategory(props.id)" class="action-icon"> <i
                class="ri-delete-bin-2-fill text-lg"></i></Link>
        </td>
    </tr>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia'
import { reactive } from 'vue'



const props = defineProps({
    product: Object,
})

const submitDeleteCategory = (id) => {
    Inertia.delete(route('admin.categories.destroy', { id: id }));
}
</script>

<style lang="scss">

</style>
