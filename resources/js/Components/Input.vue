<script setup>

defineEmits(['update:model_value']);

const props = defineProps({
    type: String,
    model: {
        type: String,
        default: null,
        required: false,
    },
    model_value: {
        type: String,
        required: false,
    },
    placeholder: {
        type: String,
    }
})

</script>

<template>
    <div class="field create-password">
        <div class="input-field">
            <input
                :type="props.type"
                :placeholder="props.placeholder"
                class="password"
                :value="props.model_value"
                @input="$emit('update:model_value', $event.target.value)"
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
