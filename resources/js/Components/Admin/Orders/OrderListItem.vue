<template>
    <tr>
        <td>
        </td>
        <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">{{ order.id }}</a>
        </td>
        <td>

        </td>
        <td>{{ order.created_at }}</td>
        <td>

            <h5 v-if="order.status === 'COMPLETED'"><span class="badge bg-soft-success text-success"><i
                        class="mdi mdi-bitcoin"></i> Paid</span></h5>
            <h5 v-else><span class="badge bg-soft-danger text-danger"><i class="mdi mdi-bitcoin"></i> Not completed</span></h5>

        </td>
        <td>
            ${{ order.paid_amount }}
        </td>
        <td>
            {{ order.user.email }}
        </td>
        <td>
            <h5 class="text-center"><span class="badge bg-success">{{ order.products_count }}</span></h5>
        </td>
        <td>
            <Link :href="route('admin.orders.show', { order: order.id })" class="action-icon"> <i class="ri-eye-fill text-lg"></i></Link>
            <Link href="''" class="action-icon"> <i class="ri-edit-box-line text-lg"></i></Link>
        </td>
    </tr>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    order: {
        type: Object,
        required: true,
    }
});
</script>

<style lang="scss">

</style>
