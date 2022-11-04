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
                                        <small>Sign Up</small>
                                    </div>
                                    <InputError class="mt-2 text-danger" :message="form.errors.email" />
                                    <InputError class="mt-2 text-danger" :message="form.errors.password" />
                                    <InputError class="mt-2 text-danger" :message="form.errors.password_confirmation" />
                                    <InputError class="mt-2 text-danger" :message="form.errors.name" />


                                    <div class="relative w-full mb-3"><label
                                            class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                            for="grid-password">Name</label>
                                        <input v-model="form.name"
                                            class="appearance-none border-2 rounded w-full py-3 px-3 leading-tight border-gray-300 bg-gray-100 focus:outline-none focus:border-indigo-700 focus:bg-white text-gray-700 pr-16"
                                            id="name" placeholder="Name" type="text"
                                            style="transition: all 0.15s ease 0s;">
                                    </div>

                                    <EmailInput v-model:email="form.email" />
                                    <PasswordInput v-model:password="form.password" />
                                    <PasswordInput v-model:password="form.password_confirmation"
                                        :placeholder="'Confirm Password'" />
                                    <div class="text-center mt-6">
                                        <button
                                            class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                            type="submit" style="transition: all 0.15s ease 0s;"> Register
                                        </button>
                                    </div>

                                    <p class="mb-0 text-lg text-center text-muted">Already have account?
                                        <Link class="font-bold" :href="route('login')"> Log in</Link>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
