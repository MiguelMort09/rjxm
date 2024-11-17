<script setup>
import {onMounted, ref} from "vue";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faFacebook, faInstagram} from "@fortawesome/free-brands-svg-icons";
import {faX} from "@fortawesome/free-solid-svg-icons";

const teamMembers = ref([]);
const isVisible = ref(false);

const loadMembers = async () => {
	await axios.get(route('team-members.index'), {}).then((res) => {
		teamMembers.value = res.data;
	});
};

const observer = new IntersectionObserver(([entry]) => {
	isVisible.value = entry.isIntersecting;
}, {threshold: 0.2});

onMounted(() => {
	loadMembers();
	const teamSection = document.querySelector("#team-section");
	if (teamSection) observer.observe(teamSection);
});
</script>
<template>
	<section class="container max-w-4xl mx-auto px-4 py-12 ">
		<h2 class="text-3xl font-bold text-center mb-8">
			Dirigencia Estatal
		</h2>
		<p class="text-center mb-24 max-w-2xl mx-auto">
			"Nuestra Dirigencia Estatal trabaja por y para los jóvenes de nuestro estado. Con pasión y compromiso, lideramos proyectos e iniciativas que buscan mejorar nuestras comunidades y
			consolidar un futuro lleno de oportunidades para todos.
		</p>
		<div id="team-section" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-20 ">
			<div
				v-for="(member, index) in teamMembers"
				v-show="index < 2"
				:key="member.id"
				:class="{ 'opacity-0 translate-y-8': !isVisible, 'opacity-100 translate-y-0': isVisible }"
				class="bg-red-500 rounded-lg shadow-lg transition-all duration-700 ease-in-out transform hover:scale-105 content-center text-center flex flex-col"
			>
				<!-- Contenedor de la foto centrado y fuera del área roja -->
				<div class="relative w-full flex justify-center -mt-16">
					<div class="bg-white rounded-full">
						<img
							:alt="member.name"
							:src="member.photo"
							class="w-32 h-32 object-cover rounded-full border-4 border-white"
						/>
					</div>
				</div>

				<!-- Información del miembro -->
				<div class="p-6 flex-1">
					<h3 class="text-xl font-semibold mb-2 text-red-50">
						{{ member.name }}
					</h3>
					<p class="text-gray-100 mb-4">{{ member.position }}</p>
					<!-- Aquí usamos v-html para renderizar el contenido HTML en la biografía -->
					<div class="text-gray-100 mb-4" v-html="member.biography"></div>
				</div>
				<div class="flex justify-center space-x-4 mt-auto mb-4">
					<a class="text-white" href="#" target="_blank">
						<FontAwesomeIcon :icon="faFacebook" size="lg"/>
					</a>
					<a class="text-white" href="#" target="_blank">
						<FontAwesomeIcon :icon="faX" size="lg"/>
					</a>
					<a class="text-white" href="#" target="_blank">
						<FontAwesomeIcon :icon="faInstagram" size="lg"/>
					</a>
				</div>
			</div>
		</div>


	</section>
</template>

