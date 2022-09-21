<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import EmailInput from "@/Components/EmailInput.vue";
import PasswordInput from "@/Components/PasswordInput.vue";
import Input from "@/Components/Input.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
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
            <div class="card">
                <div class="container">
                    <form @submit.prevent="submit">
                        <div class="card-body text-center">
                            <div class="mb-4">
                                <i class="feather icon-user-plus auth-icon"></i>
                            </div>
                            <h3 class="mb-4">Sign up</h3>
                            <InputError class="mt-2 text-danger" :message="form.errors.email" />
                            <InputError class="mt-2 text-danger" :message="form.errors.password" />
                            <InputError class="mt-2 text-danger" :message="form.errors.password_confirmation" />
                            <InputError class="mt-2 text-danger" :message="form.errors.name" />


                            <Input :placeholder="'Username'" v-model:model_value="form.name" :type="text" />

                            <EmailInput v-model:email="form.email"/>

                            <PasswordInput v-model:password="form.password" />

                            <PasswordInput v-model:password="form.password_confirmation" :placeholder="'Confirm Password'" />

                            <div class="form-group text-left">
                                <div class="checkbox checkbox-fill d-inline">
                                    <input
                                        type="checkbox"
                                        name="checkbox-fill-2"
                                        id="checkbox-fill-2"
                                    />
                                    <label for="checkbox-fill-2" class="cr"
                                        >Send me the
                                        <a href="#!"> Newsletter</a>
                                        weekly.</label
                                    >
                                </div>
                            </div>
                            <button :disabled="form.processing" class="btn btn-primary shadow-2 mb-4">
                                Sign up
                            </button>
                            <p class="mb-0 text-muted">
                                Allready have an account?
                                <Link :href="route('login')"> Log in</Link>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
