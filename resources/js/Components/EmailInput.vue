<script setup>

defineEmits(['update:email']);
const props = defineProps({
    model: {
        type: String,
        default: null,
        required: false,
    },
    email: {
        type: String,
        required: false,
    }
});

</script>

<template>
    <div class="relative w-full mb-3" ><label
            class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password"
            >Email</label>
        <input :value="props.email" @input="$emit('update:email', $event.target.value)"
            class="appearance-none border-2 rounded w-full py-3 px-3 leading-tight border-gray-300 bg-gray-100 focus:outline-none focus:border-indigo-700 focus:bg-white text-gray-700 pr-16"
            id="email" placeholder="Email" type="email"  style="transition: all 0.15s ease 0s;">
    </div>
    <!-- <div class="field create-password">
        <div class="input-field">
            <input type="email" placeholder="Email" class="password" :value="props.email"
                @input="$emit('update:email', $event.target.value)" />
        </div>
        <span class="error password-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">
                Please enter atleast 8 charatcer with number, symbol, small and
                capital letter.
            </p>
        </span>
    </div> -->
</template>

<style>

</style>
