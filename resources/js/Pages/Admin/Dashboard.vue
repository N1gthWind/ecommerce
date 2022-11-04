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
    }
});

</script>

<template>
    <AdminLayout :logo="$page.props.assets.logo" :avatar="$page.props.assets.avatar">

    </AdminLayout>
</template>

<style>

</style>
