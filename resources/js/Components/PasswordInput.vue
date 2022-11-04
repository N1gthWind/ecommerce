<script setup>
import { ref } from "vue";

defineEmits(["update:password"]);


const props = defineProps({
    placeholder: {
        type: String,
        default: "Password",
    },
    password: {
        type: String,
        required: false,
    }
});

const show_password_ref = ref(false);
</script>

<template>
    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-password">Password</label>
    <div class="relative w-full mb-3">
        <div class="absolute inset-y-0 right-0 flex items-center px-2">
            <input class="hidden js-password-toggle"
                type="checkbox"><label @click="show_password_ref = !show_password_ref"
                class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 cursor-pointer js-password-label"
                >{{ show_password_ref ? 'Hide' : 'Show' }}</label>
        </div>

        <input :type="[show_password_ref ? 'text' : 'password']" :placeholder="props.placeholder"
            :value="props.password" @input="$emit('update:password', $event.target.value)"
            class="appearance-none border-2 rounded w-full py-3 px-3 leading-tight border-gray-300 bg-gray-100 focus:outline-none focus:border-indigo-700 focus:bg-white text-gray-700 pr-16 js-password"
            autocomplete="off">
    </div>


    <!-- <div class="field create-password">
        <div class="input-field">
            <input :type="[show_password_ref ? 'text' : 'password']" :placeholder="props.placeholder" class="password"
                :value="props.password" @input="$emit('update:password', $event.target.value)" />
            <i @click="show_password_ref = !show_password_ref" class="fa-solid"
                :class="[show_password_ref ? 'fa-eye-slash' : 'fa-eye']"></i>
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
