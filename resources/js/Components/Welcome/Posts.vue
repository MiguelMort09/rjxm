<script lang="ts" setup>
import {onMounted, ref} from 'vue';
import Button from 'primevue/button';
import Card from 'primevue/card';
import Carousel from 'primevue/carousel';

interface Post {
    slug: string;
    title: string;
    cover_image: string;
    description: string;
}

const posts = ref<Post[]>([]);
const postFeatured = ref<Post | null>(null);
const isLoading = ref<boolean>(true);
const errorMessage = ref<string | null>(null);

// Declare the lifecycle hook first
onMounted(async () => {
    try {
        const response = await fetch(route('posts.index'));
        const data = await response.json();
        posts.value = data.data; // Asigna los datos al array posts
        if (posts.value.length > 0) {
            postFeatured.value = posts.value[0]; // Asigna el primer post a firstPost
        }
    } catch (error) {
        console.error('Error cargando las publicaciones:', error);
    }
});

const responsiveOptions = ref([
    {
        breakpoint: '1400px',
        numVisible: 2,
        numScroll: 1,
    },
    {
        breakpoint: '1199px',
        numVisible: 3,
        numScroll: 1,
    },
    {
        breakpoint: '767px',
        numVisible: 2,
        numScroll: 1,
    },
    {
        breakpoint: '575px',
        numVisible: 1,
        numScroll: 1,
        showNavigators: false

    },
]);
</script>

<template>
    <section>
        <div class="md:mx-auto px-4 pt-8">
            <h2 class="text-3xl font-bold mb-6">Últimas Noticias</h2>
        </div>

        <div
            v-if="postFeatured !== null"
            v-animateonscroll="{ enterClass: 'animate-zoomin'}"
            class="bg-white shadow-2xl transition-all ease-out animate-duration-1000 translate-y-8"
        >
            <div class="md:mx-auto px-4 py-6">
                <div class="flex lg:flex-row flex-col gap-4">
                    <div class="flex-1 overflow-hidden">
                        <img
                            :alt="`Cover image for ${postFeatured.title}`"
                            :src="postFeatured.cover_image"
                            class="h-full w-full object-cover lg:[clip-path:polygon(10%_0,100%_0%,100%_100%,0_100%)]"
                        />
                    </div>
                    <div class="flex-1 flex items-center justify-center lg:order-first">
                        <div class="px-2 mx:px-6 pt-12 lg:px-12">
                            <h1 class="text-xl sm:text-3xl lg:text-5xl font-bold text-surface-900 mb-4 lg:leading-normal text-center lg:text-left">
                                {{ postFeatured.title }}
                            </h1>
                            <p class="text-black text-lg leading-normal mb-8 text-center text-justify"
                               v-html="postFeatured.description"></p>
                            <div class="flex items-center justify-center lg:justify-end gap-6">
                                <Button :href="route('posts.show', postFeatured.slug)" as="a" class="md:w-1/4"
                                        label="Leer más..."/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else-if="isLoading" class="text-center">
            <p>Loading posts...</p>
        </div>
        <div v-else-if="errorMessage" class="text-center text-red-500">
            <p>{{ errorMessage }}</p>
        </div>

        <div class="w-full px-4 py-10 md:px-10 xl:p-20">
            <Carousel :autoplayInterval="3000" :numScroll="1" :numVisible="3" :responsiveOptions="responsiveOptions"
                      :value="posts"
                      circular>
                <template #item="slotProps">
                    <Card class="mx-2 md:mx-4">
                        <template #header>
                            <img :alt="`Cover image for ${slotProps.data.title}`" :src="slotProps.data.cover_image"
                                 class="h-52 w-full object-cover"/>
                        </template>
                        <template #title>
                            <h2 class="h-24 text-center">
                                <span class="inline-block align-middle align-middle">
                                {{ slotProps.data.title }}
                                    </span>
                            </h2>
                        </template>
                        <template #footer>
                            <Button :href="route('posts.show', slotProps.data.slug)" as="a" class="w-full"
                                    label="Leer más..." outlined severity="secondary" variant="link"/>

                        </template>
                    </Card>
                </template>
            </Carousel>
        </div>
    </section>
</template>
