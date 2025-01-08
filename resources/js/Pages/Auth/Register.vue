<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputText from 'primevue/inputtext';
import {Head, Link, useForm} from '@inertiajs/vue3';
import Button from "primevue/button";
import Image from "primevue/image";
import Password from 'primevue/password';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register"/>
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
                            Registrate para continuar
                        </span>
                    </div>
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="name" value="Name"/>

                            <InputText
                                id="name"
                                v-model="form.name"
                                autocomplete="name"
                                autofocus
                                class="mt-1 block w-full"
                                required
                                type="text"
                            />

                            <InputError :message="form.errors.name" class="mt-2"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="email" value="Email"/>

                            <InputText
                                id="email"
                                v-model="form.email"
                                autocomplete="username"
                                class="mt-1 block w-full"
                                required
                                type="email"
                            />

                            <InputError :message="form.errors.email" class="mt-2"/>
                        </div>

                        <div class="mt-4 w-full">
                            <InputLabel for="password" value="Password"/>
                            <Password id="password"
                                      v-model="form.password"
                                      autocomplete="new-password"
                                      fluid
                                      required
                                      toggleMask
                            />
                            <InputError :message="form.errors.password" class="mt-2"/>
                        </div>

                        <div class="mt-4 w-full">
                            <InputLabel
                                for="password_confirmation"
                                value="Confirm Password"
                            />
                            <Password
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                autocomplete="new-password"
                                fluid
                                required

                                toggleMask
                            />
                            <InputError
                                :message="form.errors.password_confirmation"
                                class="mt-2"
                            />
                        </div>

                        <Button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            :type="'submit'"
                            class="mt-4 w-full"
                            label="Registrarse"
                        />
                        <Button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            class="mt-4 w-full"
                            icon-class="google"
                            label="Registrarse con Google"
                            severity="secondary"
                            size="large"
                        />
                        <div class="mt-4 flex items-center justify-end">
                            <Link
                                :href="route('login')"
                                class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                ¿Ya estar registrado?
                            </Link>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
