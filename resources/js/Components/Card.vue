<script lang="ts" setup>
const props = defineProps({
	title: {
		type: String,
		default: ''
	}
});
</script>

<template>
	<section class="content-center">
		<div
			class="bg-white rounded-lg shadow-md overflow-hidden h-full transition-all duration-300 ease-in-out transform hover:scale-[1.05] hover:shadow-md flex flex-col py-4 px-6"
		>
			<div class="mb-2">
				<h3 class="uppercase font-bold  text-center">
					{{ props.title }}
				</h3>
			</div>
			<div class="h-full">
				<slot/>
			</div>
		</div>
	</section>
</template>

<style scoped>

</style>