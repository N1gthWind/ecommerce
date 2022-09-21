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
    <div class="field create-password">
        <div class="input-field">
            <input
                :type="[show_password_ref ? 'text' : 'password']"
                :placeholder="props.placeholder"
                class="password"
                :value="props.password"
                @input="$emit('update:password', $event.target.value)"
            />
            <i @click="show_password_ref = !show_password_ref" class="fa-solid" :class="[show_password_ref ? 'fa-eye-slash' : 'fa-eye']"></i>
        </div>
        <span class="error password-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">
                Please enter atleast 8 charatcer with number, symbol, small and
                capital letter.
            </p>
        </span>
    </div>
</template>

<style></style>
