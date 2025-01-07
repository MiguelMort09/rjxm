<script setup>
import {Head} from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Hero from "@/Components/Welcome/Hero.vue";
import Footer from "@/Components/Footer.vue";
import Team from "@/Components/Welcome/Team.vue";
import Posts from "@/Components/Welcome/Posts.vue";


defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

</script>

<template>
    <Head title="Welcome"/>
    <GuestLayout>
        <Hero/>
        <div class="w-full bg-gray-100">
            <Posts/>
        </div>

        <div class="w-full bg-white">
            <Team/>
        </div>
        <Footer/>
    </GuestLayout>

</template>
