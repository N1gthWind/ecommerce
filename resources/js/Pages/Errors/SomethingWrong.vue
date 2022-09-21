<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div class="auth-wrapper offline">
        <div class="text-center">
            <h1 class="mb-4">OFFLINE</h1>
            <h5 class="text-muted mb-4">Oops! Something went wrong!</h5>
            <Link :href="route('login')" class="btn btn-primary mb-4">
                <i class="feather icon-home"></i>Back to Home
            </Link>
        </div>
    </div>
</template>

<style></style>
