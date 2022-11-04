<template>
        <label class="ml-4" for="star-item-1">
            <i v-for="(star,    index) in props.star_count" :key="index" class="fas fa-star text-yellow-500"></i>
            <span class="ml-2">({{ review_number }})</span>
        </label>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import { computed } from "vue";
const props = defineProps({
    star_count: {
        required: true,
        type: Number,
    },
    review_number: {
        required: true,
        type: Number,
    }
});


</script>

<style lang="scss">

</style>
