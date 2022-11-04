<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
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


                            <div class="rounded-t mb-0 px-6 py-6">
                                <div class="text-gray-500 text-center mb-3 text-2xl font-bold">
                                    <small class="text-2xl">Verify your email</small>

                                    <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
                                        A new verification link has been sent to the email address you provided
                                        during registration.
                                    </div>

                                    <div class="mb-4 mt-4 text-base text-gray-600">
                                        Thanks for signing up! Before getting started, could you verify your email
                                        address by clicking on the link we just emailed to you? If you didn't
                                        receive the email, we will gladly send you another.
                                    </div>

                                    <form @submit.prevent="submit">
                                        <div class="mt-4 flex items-center gap-4 justify-between">
                                            <div class="text-center mt-6">
                                                <button :disabled="form.processing"
                                                    :class="{ 'opacity-25': form.processing }"
                                                    class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-2 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                                    type="submit" style="transition: all 0.15s ease 0s;"> Resend
                                                    verification email
                                                </button>
                                            </div>
                                            <div class="text-center mt-6">
                                                <Link method="post" as="button" :href="route('logout')"
                                                    :disabled="form.processing"
                                                    :class="{ 'opacity-25': form.processing }"
                                                    class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-2 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                                    type="submit" style="transition: all 0.15s ease 0s;">
                                                Log out
                                                </Link>
                                            </div>



                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- <GuestLayout>
        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent" >
            A new verification link has been sent to the email address you provided during registration.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Resend Verification Email
                </PrimaryButton>

                <Link :href="route('logout')" method="post" as="button" class="underline text-sm text-gray-600 hover:text-gray-900">Log Out</Link>
            </div>
        </form>
    </GuestLayout> -->
</template>
