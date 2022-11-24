

<template>
    <div>
        <!-- <p>Toast Success Notification</p> -->
    </div>
</template>

<script setup>
import { watch } from 'vue';
import { onUpdated, ref } from "@vue/runtime-core";
import { useToast } from "vue-toastification";
import { Link, usePage } from '@inertiajs/inertia-vue3';

const toast = useToast();


watch(() => usePage().props.value.flash.success, (newVal, oldVal) => {

    if (newVal != null || newVal != undefined) {
        console.log(newVal, oldVal);
        toast.success(newVal, {
            timeout: 2000
        })
    }
}, { deep: true });








</script>

<style lang="scss">

</style>
