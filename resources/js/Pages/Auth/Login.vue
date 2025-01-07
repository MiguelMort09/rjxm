<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputText from 'primevue/inputtext';
import {Head, Link, useForm} from '@inertiajs/vue3';
import Button from "primevue/button";
import Image from "primevue/image";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>


        <Head title="Log in"/>

        <div class="min-h-screen content-center py-10">
            <div class="max-w-xl mx-auto content-center h-full">
                <div class="w-full bg-white py-10 px-10 rounded-xl">
                    <div class="justify-self-center py-6">
                        <Image alt="RJXM_LOGO" src="assets/img/rj2.png"/>
                    </div>
                    <div class="text-center mb-8">
                        <div class="text-surface-900 text-3xl font-medium mb-4">
                            ¡Bienvenido al portal de la RJxM!
                        </div>
                        <span class="text-muted-color font-medium">
                            Iniciar Sesión
                        </span>
                    </div>

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel :class="' text-lg font-bold'" for="email" value="Email"/>

                            <InputText
                                id="email"
                                v-model="form.email"
                                autocomplete="username"
                                autofocus
                                class="mt-1 block w-full"
                                required
                                type="email"
                            />

                            <InputError :message="form.errors.email" class="mt-2"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel :class="' text-lg font-bold'" for="password" s value="Password"/>

                            <InputText
                                id="password"
                                v-model="form.password"
                                autocomplete="current-password"
                                class="mt-1 block w-full"
                                required
                                type="password"
                            />

                            <InputError :message="form.errors.password" class="mt-2"/>
                        </div>

                        <div class="mt-4 block">
                            <label class="flex items-center">
                                <Checkbox v-model:checked="form.remember" name="remember"/>
                                <span class="ms-2 text-sm text-gray-600"
                                >
                                    Recordar tu contraseña
                                </span>
                            </label>
                        </div>

                        <Button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            class="w-full mt-4"
                            label="Iniciar Sesión"
                        />
                        <Button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            class="mt-4 w-full"
                            icon-class="google"
                            label="Iniciar Sesión con Google"
                            severity="secondary"
                            size="large"
                        />
                        <div class="mt-4 flex items-center justify-end">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                ¿Olvidaste tu constraseña?
                            </Link>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </GuestLayout>
</template>
