<template>
    <div class="relative flex items-start mt-2">
        <div class="flex items-center h-5"><input :id="id" aria-describedby="comments-description" name="comments"
                type="checkbox" class="focus:ring-yellow-500 h-4 w-4 text-yellow-600 border-gray-300 rounded"></div>
        <div class="ml-3 text-sm"><label for="comments" class="font-medium text-gray-700 hover:text-yellow-600">{{ name
        }}<span>({{ count }})</span></label></div>
    </div>
</template>

<script setup>
const props = defineProps({
    count: {
        required: true,
        type: Number,
    },
    name: {
        required: true,
        type: String,
    },
    id: {
        required: true,
        type: String,
    }
});
</script>

<style lang="scss">

</style>
