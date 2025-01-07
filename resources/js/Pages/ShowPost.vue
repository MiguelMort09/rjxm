<script lang="ts" setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Splitter from "primevue/splitter";
import SplitterPanel from "primevue/splitterpanel";
import DataView from "primevue/dataview";
import axios from "axios";
import {Link} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";

// Definimos la interfaz para el tipo de datos de un post
interface Post {
    id: number;
    title: string;
    slug: string;
    description: string;
    cover_image: string;
}

// Reactividad para los posts y el post destacado
const posts = ref<Post[]>([]);
const postFeatured = ref<Post | null>(null);

// Propiedades definidas para el componente
const props = defineProps<{
    post: Post;
}>();

// Función para cargar los posts
const loadPosts = async () => {
    try {
        const {data} = await axios.get(route("posts.index"), {params: {limit: 4}});
        postFeatured.value = data.featured; // Aseguramos que `featured` tenga el tipo `Post`
        posts.value = data.posts; // Aseguramos que `posts` sea un arreglo de objetos tipo `Post`
    } catch (error) {
        console.error("Error loading posts:", error);
    }
};

// Cargar los posts al montar el componente
onMounted(() => {
    loadPosts();
});
</script>

<template>
    <GuestLayout>
        <div class="min-h-screen bg-gray-100 flex flex-col items-center">
            <div class="bg-red-600 w-full h-52 md:h-80 flex items-center justify-center">
            </div>
            <Splitter :unstyled="true" class="relative container max-w-7xl mx-auto 2xl:max-w-screen-2xl">
                <!-- Panel izquierdo -->
                <SplitterPanel :size="30" class="w-full flex flex-col justify-center p-10">
                    <h3 class="text-center font-semibold text-2xl uppercase text-gray-800 mb-6 border-b-4 border-red-600 pb-2">
                        Te puede interesar
                    </h3>

                    <DataView :unstyled="true" :value="posts" dataKey="id">
                        <template #list="slotProps">
                            <div class="w-full flex flex-col justify-center gap-6">
                                <div v-for="item in slotProps.items" :key="item.id">
                                    <Link :href="route('posts.show', item.slug)">
                                        <div
                                            class="w-full bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                                            <img
                                                :alt="item.title"
                                                :src="item.cover_image"
                                                class="w-full object-cover h-40 md:h-52"
                                            />
                                            <h2
                                                class="text-gray-900 text-xl font-bold text-center p-4 border-t border-gray-200"
                                                v-text="item.title"
                                            ></h2>
                                        </div>
                                    </Link>
                                </div>
                            </div>
                        </template>
                    </DataView>
                </SplitterPanel>

                <!-- Panel derecho -->
                <SplitterPanel
                    :size="70"
                    class="bg-white h-full shadow-xl rounded-xl flex items-center justify-center -mt-16 md:-mt-40 mb-12 z-40"
                >
                    <div class="w-full p-10">
                        <div class="text-center space-y-6">
                            <!-- Título del post -->
                            <h1
                                class="text-4xl font-extrabold text-gray-900 leading-tight tracking-wide border-b-4 border-red-600 pb-4"
                            >
                                {{ props.post.title }}
                            </h1>

                            <!-- Imagen de portada -->
                            <div class="overflow-hidden rounded-lg shadow-lg">
                                <img
                                    :alt="props.post.title"
                                    :src="props.post.cover_image"
                                    class="h-[40vh] w-full object-cover"
                                />
                            </div>

                            <!-- Descripción del post -->
                            <p
                                class="text-lg text-gray-700 leading-relaxed text-justify"
                                v-html="props.post.description"
                            ></p>

                        </div>
                    </div>
                </SplitterPanel>
            </Splitter>
        </div>
    </GuestLayout>
</template>


