<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Input from "@/Components/Input.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import EmailInput from "@/Components/EmailInput.vue";


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

                                        <EmailInput class="text-left mt-4" v-model:email="form.email" />

                                        <div class="text-center mt-6">
                                            <button
                                                class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                                type="submit" style="transition: all 0.15s ease 0s;"> Request new
                                                password
                                            </button>
                                        </div>


                                        <p class="mb-0 text-lg text-center text-muted mt-2">Already have account?
                                            <Link class="font-bold" :href="route('login')"> Log in</Link>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
