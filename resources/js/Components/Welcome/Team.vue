<script setup>
import {onMounted, ref} from "vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faFacebook, faInstagram} from "@fortawesome/free-brands-svg-icons";
import {faX} from "@fortawesome/free-solid-svg-icons";

const teamMembers = ref([]);

const loadMembers = async () => {
    try {
        const response = await fetch(route("team-members.index"));
        if (!response.ok) {
            throw new Error(`Error: ${response.statusText}`);
        }
        const data = await response.json();
        teamMembers.value = data;
    } catch (error) {
        console.error("Failed to load team members:", error);
    }
};

onMounted(() => {
    loadMembers();
});
</script>
<template>
    <section>
        <div v-animateonscroll="{ enterClass: 'animate-zoomin'}"
             class="container max-w-5xl mx-auto px-4 pt-12 animate-duration-500">
            <h2 class="text-black text-3xl font-bold text-center mb-8">
                Dirigencia Estatal
            </h2>
            <p class="text-center mb-24 max-w-3xl mx-auto text-xl">
                "Nuestra Dirigencia Estatal trabaja por y para los jóvenes de nuestro estado. Con pasión y compromiso,
                lideramos proyectos e iniciativas que buscan mejorar nuestras comunidades y consolidar un futuro lleno
                de
                oportunidades para todos.
            </p>
        </div>

        <div class="max-w-6xl mx-auto px-4 pb-12">
            <div v-animateonscroll="{ enterClass: 'animate-zoomin' }"
                 class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-20 md:gap-8  animate-duration-1000 ">
                <div
                    v-for="(member, index) in teamMembers"
                    v-show="index < 3"
                    :key="member.id"

                    class="bg-red-500 rounded-lg shadow-lg content-center text-center flex flex-col"
                >
                    <!-- Contenedor de la foto centrado y fuera del área roja -->
                    <div class="relative w-full flex justify-center -mt-16">
                        <div class=" rounded-full">
                            <img
                                :alt="member.name"
                                :src="member.photo"
                                class="w-32 h-32 object-cover rounded-full border-4 border-white"
                            />
                        </div>
                    </div>

                    <!-- Información del miembro -->
                    <div
                        class="p-6 flex-1">
                        <h3 class="text-xl font-semibold mb-2 text-red-500">
                            {{ member.name }}
                        </h3>
                        <h4 class="text-gray-100 mb-4 font-bold">{{ member.position }}</h4>
                        <!-- Aquí usamos v-html para renderizar el contenido HTML en la biografía -->
                        <div class="text-gray-100 mb-4" v-html="member.biography"></div>
                    </div>
                    <div class="flex justify-center space-x-4 mt-auto mb-4">
                        <a :href="member.email" class="text-white" target="_blank">
                            <FontAwesomeIcon :icon="faFacebook" size="lg"/>
                        </a>
                        <a :href="member.facebook" class="text-white" target="_blank">
                            <FontAwesomeIcon :icon="faX" size="lg"/>
                        </a>
                        <a :href="member.instagram" class="text-white" target="_blank">
                            <FontAwesomeIcon :icon="faInstagram" size="lg"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

