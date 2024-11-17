<script lang="ts">
import {defineComponent} from 'vue'
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default defineComponent({
	name: "Hero",
	components: {PrimaryButton}
})
</script>

<template>
	<div class="bg-red-500 md:min-h-screen md:content-center md:relative">
		<div class="md:absolute md:top-1/4 w-full bg-red-500/60">
			<div class="mx-auto max-w-7xl py-6">
				<div class="text-center space-y-4">
					<h1 class="mb-4 uppercase text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-4xl dark:text-white">
						El futuro de México lo construimos juntos.
					</h1>
					<h2 class="mb-4 uppercase text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-4xl dark:text-white">
						¡Es momento de actuar!
					</h2>
				</div>
			</div>
		</div>
		<img alt="hero" class="top-0 w-full" src="/assets/img/HERO.jpg">
	</div>

</template>

<style scoped>

</style>
