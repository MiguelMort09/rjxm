<template>
    <div
        class="min-h-screen flex flex-col pt-6 px-6 lg:px-20 overflow-hidden justify-center"
        style="background: linear-gradient(0deg, rgba(255, 250, 250, 0.2), rgba(255, 0, 0, .9)), radial-gradient(77.36% 256.97% at 77.36% 57.52%, rgb(238, 239, 175) 0%, rgb(195, 227, 250) 100%); clip-path: ellipse(150% 87% at 93% 13%)"
    >
        <div class="justify-self-center mx-6 md:mx-20 mt-0 md:mt-6">
            <h1 class="text-6xl font-bold text-gray-900 leading-tight"><span
                class="font-light block">Eu sem integer</span>eget magna fermentum</h1>
            <p class="font-normal text-2xl leading-normal md:mt-4 text-gray-700">Sed blandit libero volutpat sed cras.
                Fames ac turpis egestas integer. Placerat in egestas erat...</p>
            <Button as="router-link" class="!text-xl mt-8 !px-4" label="Get Started" rounded to="/"></Button>
        </div>
        <div class="flex justify-center md:justify-end">

        </div>
    </div>

    <div
        id="hero"
        class="relative flex flex-col pt-6 min-h-screen overflow-hidden"
        style="background: linear-gradient(0deg, rgba(255, 0, 0, .5), rgba(255, 255, 0, 0.2)), radial-gradient(77.36% 256.97% at 77.36% 57.52%, rgb(195, 227, 250) 100%, rgb(238, 239, 175) 0%); clip-path: ellipse(150% 87% at 93% 13%)"
    >

        <img alt="Hero Image" class="absolute top-0 w-full md:min-h-screen"
             src="assets/img/HERO.jpg"/>
        <div class="md:min-h-screen z-10 w-full mx-4 md:max-w-7xl md:mx-auto text-center py-20">
            <h1 class="text-lg md:text-2xl xl:text-4xl font-bold text-white  leading-tight ">
                <span class="bg-red-500/60 px-4 py-2 rounded-full">
                Eu sem integereget magna fermentum
                    </span>
            </h1>
            <p class="font-normal text-base md:text-xl lg:text-2xl leading-normal md:mt-4 text-red-500 bg-white/50 px-4 py-2 rounded-full">
                Sed blandit libero volutpat sed cras. Fames ac turpis egestas integer. Placerat in egestas erat...
            </p>
            <Button as="router-link"
                    class="!text-xl mt-8 !px-4"
                    label="Leer mas..."
                    outlined rounded
                    severity="danger"
                    to="/"></Button>
        </div>

    </div>


</template>
<script setup>
import Button from 'primevue/button';
</script>
