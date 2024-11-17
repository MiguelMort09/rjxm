<script lang="ts" setup>
</script>

<template>
	<div class="fixed top-0 left-0 right-0 p-4 hidden md:block z-50">
		<div class="relative max-w-4xl mx-auto px-4 py-2 bg-red-500/70 backdrop-blur-lg rounded-full h-14">
			<div class="absolute inset-0 flex items-center justify-around z-10 space-x-4">
				<slot/>
			</div>
		</div>
	</div>
</template>
