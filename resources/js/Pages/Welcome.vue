<script setup>
import {Head} from '@inertiajs/vue3';
import {defineAsyncComponent} from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Hero from "@/Components/Welcome/Hero.vue";
import Footer from "@/Components/Footer.vue";
import Team from "@/Components/Welcome/Team.vue";


defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
});

const Post = defineAsyncComponent(() =>
	import('@/Components/Welcome/Posts.vue')
)
const Calls = defineAsyncComponent(() =>
	import('@/Components/Welcome/Calls.vue')
)
</script>

<template>
	<Head title="Welcome"/>
	<GuestLayout>
		<Hero/>
		<div class="w-full bg-gray-100">
			<Post/>
		</div>
		<Calls/>
		<div>
		</div>
		<div class="w-full bg-gray-100">
			<Team/>
		</div>
		<Footer/>
	</GuestLayout>

</template>
