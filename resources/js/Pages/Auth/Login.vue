<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import PasswordInput from "@/Components/PasswordInput.vue";
import EmailInput from "@/Components/EmailInput.vue"
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
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
                            <h3 class="mb-4">Login</h3>
                            <div v-if="status" class="mt-2 text-success">
                                {{ status }}
                            </div>

                            <InputError class="mt-2 text-danger" :message="form.errors.email" />
                            <InputError class="mt-2 text-danger" :message="form.errors.password" />
                            <EmailInput v-model:email="form.email" />



                            <PasswordInput v-model:password="form.password" />



                            <div class="form-group text-left">
                                <div class="checkbox checkbox-fill d-inline">
                                    <input
                                        type="checkbox"
                                        name="checkbox-fill-1"
                                        id="checkbox-fill-a1"
                                        v-model="form.remember"

                                    />
                                    <label for="checkbox-fill-a1" class="cr">
                                        Remember credentials</label
                                    >
                                </div>
                            </div>
                            <button :disabled="form.processing" @click="submit" class="btn btn-primary shadow-2 mb-4">
                                Login
                            </button>
                            <p v-if="canResetPassword" class="mb-2 text-muted">
                                Forgot password?
                                <Link :href="route('password.request')">Reset</Link>
                            </p>
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
