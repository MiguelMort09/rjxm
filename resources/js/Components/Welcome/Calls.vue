<script setup>
import {onMounted, ref} from 'vue';
import Modal from "@/Components/Modal.vue";

const calls = ref([]);

const loadCalls = async () => {
    await axios.get(route('calls.index'), {
        params: {
            limit: 5,
        }
    }).then((res) => {
        let data = res.data;
        calls.value = data.data;
    });
};

const convocatoriaSeleccionada = ref(null);

const verDetalles = (convocatoria) => {
    convocatoriaSeleccionada.value = convocatoria;
};

const closeModal = () => {
    convocatoriaSeleccionada.value = null;
};
onMounted(() => {
    loadCalls();
});
</script>
<template>
    <section class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-center mb-8 text-white">
            Convocatorias y Eventos
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                v-for="(call) in calls"
                v-if="calls.length > 0"
                :key="call.id"
                class="bg-gray-50 rounded-lg shadow-md overflow-hidden border border-gray-200 transition-all duration-300 hover:shadow-lg"
            >
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">
                        {{ call.title }}
                    </h3>
                    <p class="text-gray-600 mb-4">{{ call.description }}</p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-red-600 font-medium">
                            Fecha límite: {{ call.end_date }}
                        </span>
                        <span class="px-2 py-1 rounded-full text-xs font-semibold">
                            {{ call.status }}
                        </span>
                    </div>
                    <button
                        class="w-full bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300"
                        @click="verDetalles(call)"
                    >
                        Ver más detalles
                    </button>
                </div>
            </div>
            <div v-else
                 class="text-center text-xl font-semibold uppercase text-white md:col-span-2 lg:col-span-3">
                ¡Por ahora, no contamos con convocatorias abiertas!
            </div>
        </div>
        <!-- Modal para detalles de la convocatoria -->
        <Modal :show="convocatoriaSeleccionada">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">{{ convocatoriaSeleccionada.titulo }}</h2>
                <p class="text-gray-600 mb-4">{{ convocatoriaSeleccionada.descripcionCompleta }}</p>
                <div class="mb-4">
                    <strong class="text-gray-700">Fecha límite:</strong> {{ convocatoriaSeleccionada.fechaLimite }}
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700">Requisitos:</strong>
                    <ul class="list-disc list-inside">
                        <li v-for="(requisito, index) in convocatoriaSeleccionada.requisitos" :key="index">
                            {{ requisito }}
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700">Contacto:</strong> {{ convocatoriaSeleccionada.contacto }}
                </div>
                <button
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300"
                    @click="closeModal"
                >
                    Cerrar
                </button>
            </div>
        </Modal>
    </section>
</template>