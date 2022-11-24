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
import { ref } from "vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
    github: String,
    google: String,
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

const show_password_ref = ref(false);
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


                            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                <div class="text-gray-500 text-center mb-3 font-bold">

                                </div>
                                <InputError class="mt-2 text-danger" :message="form.errors.email" />
                                <InputError class="mt-2 text-danger" :message="form.errors.password" />
                                <div v-if="status" class="mt-2 text-success">
                                    {{ status }}
                                </div>

                                <form>
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                            for="grid-password">Email</label>
                                        <input v-model="form.email"
                                            class="appearance-none border-2 rounded w-full py-3 px-3 leading-tight border-gray-300 bg-gray-100 focus:outline-none focus:border-indigo-700 focus:bg-white text-gray-700 pr-16"
                                            id="email" placeholder="Email" type="email"
                                            style="transition: all 0.15s ease 0s;">
                                    </div>
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="grid-password">Password</label>
                                    <div class="relative w-full mb-3">



                                        <div class="absolute inset-y-0 right-0 flex items-center px-2">
                                            <input @click="show_password_ref = !show_password_ref" class="hidden js-password-toggle" id="toggle" type="checkbox">
                                            <label
                                                class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 cursor-pointer js-password-label"
                                                for="toggle">{{ show_password_ref ? 'Hide' : 'Show' }}</label>
                                        </div>
                                        <input v-model="form.password"
                                            class="appearance-none border-2 rounded w-full py-3 px-3 leading-tight border-gray-300 bg-gray-100 focus:outline-none focus:border-indigo-700 focus:bg-white text-gray-700 pr-16 js-password"
                                            id="password"  :type="[show_password_ref ? 'text' : 'password']" autocomplete="off">

                                    </div>
                                    <div>
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input v-model="form.remember" id="customCheckLogin" type="checkbox"
                                                class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5"
                                                style="transition: all 0.15s ease 0s;" /><span
                                                class="ml-2 text-sm font-semibold text-gray-700">Remember
                                                me</span></label>
                                    </div>
                                    <div class="text-center mt-6">
                                        <button :disabled="form.processing" @click="submit"
                                            class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                            type="button" style="transition: all 0.15s ease 0s;">
                                            Sign In
                                        </button>
                                    </div>
                                    <div class="text-center mt-6 text-xl">
                                        <p v-if="canResetPassword" class="mb-2 text-lg text-center text-muted">Forgot
                                            password?
                                            <Link :href="route('password.request')" class="font-bold">Reset</Link>
                                        </p>
                                        <p class="mb-0 text-lg text-center text-muted">Don’t have an account?
                                            <Link class="font-bold" :href="route('register')">Register</Link>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<style scoped>

</style>
<style scoped>
.container {
    background-color: #111827;
    max-width: none;
}

.wrapper {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: linear-gradient(90, rgba(2, 0, 0.6, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
}
</style>

