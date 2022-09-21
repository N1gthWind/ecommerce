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
    <div class="field create-password">
        <div class="input-field">
            <input
                type="email"
                placeholder="Email"
                class="password"
                :value="props.email"
                @input="$emit('update:email', $event.target.value)"
            />
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
