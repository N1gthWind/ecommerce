<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import EmailInput from "@/Components/EmailInput.vue";
import PasswordInput from "@/Components/PasswordInput.vue";

const props = defineProps({
    email: String,
    token: String,

});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>

    <main>
        <section class="absolute w-full h-full">
            <div class="absolute top-0 w-full h-full bg-gradient-to-r from-gray-900 via-blue-600 to-cyan-400 wrapper"
                style="background-size: 100%; background-repeat: no-repeat;" :style="''"></div>
            <div class="container mx-auto px-4 h-full">
                <div class="flex content-center items-center justify-center h-full">
                    <div class="w-full lg:w-4/12 px-4">

                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
                            <form @submit.prevent="submit">
                                <div class="rounded-t mb-0 px-6 py-6">
                                    <div class="text-gray-500 text-center mb-3 text-2xl font-bold">
                                        <small class="text-2xl">Reset Password</small>
                                        <div v-if="status" class="mt-2 text-success">
                                            {{ status }}
                                        </div>

                                        <InputError class="mt-2 text-danger" :message="form.errors.email" />
                                        <InputError class="mt-2 text-danger" :message="form.errors.password" />

                                        <EmailInput v-model:email="form.email" />

                                        <PasswordInput v-model:password="form.password" />

                                        <PasswordInput placeholder="Confirm Password"
                                            v-model:password="form.password_confirmation" />
                                        <button :disabled="form.processing" @click="submit"
                                            class="btn btn-primary shadow-2 mb-4">
                                            Reset Password
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- <div class="auth-wrapper">
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
                            <InputError
                                class="mt-2 text-danger"
                                :message="form.errors.email"
                            />
                            <InputError
                                class="mt-2 text-danger"
                                :message="form.errors.password"
                            />

                            <EmailInput v-model:email="form.email" />

                            <PasswordInput v-model:password="form.password" />

                            <PasswordInput placeholder="Confirm Password" v-model:password="form.password_confirmation" />
                            <button
                                :disabled="form.processing"
                                @click="submit"
                                class="btn btn-primary shadow-2 mb-4"
                            >
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

</template>
