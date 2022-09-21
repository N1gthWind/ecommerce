<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Input from "@/Components/Input.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";


defineProps({
    status: String,
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="container">
                <form @submit.prevent="submit">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mb-4">
                                <i class="feather icon-unlock auth-icon"></i>
                            </div>
                            <h3 class="mb-4">Reset Password</h3>

                            <div v-if="status" class="mt-2 text-success">
                                {{ status }}
                            </div>

                            <InputError class="mt-2 text-danger" :message="form.errors.email" />


                            <Input type="email" placeholder="Email" v-model:model_value="form.email" />

                            <div class="form-group text-left">
                                <div class="checkbox checkbox-fill d-inline">
                                    <input
                                        type="checkbox"
                                        name="checkbox-fill-1"
                                        id="checkbox-fill-a1"
                                        checked=""
                                    />
                                </div>
                            </div>
                            <button
                                :disabled="form.processing"
                                class="btn btn-primary shadow-2 mb-4"
                            >
                                Reset Password
                            </button>
                            <p class="mb-0 text-muted">
                                Don’t have an account?
                                <Link :href="route('register')">Register</Link>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
