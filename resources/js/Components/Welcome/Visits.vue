<script setup>
import {onMounted, onUnmounted, ref} from 'vue'

const isVisible = ref(false)
const count = ref(0)
const counterRef = ref(null)

let observer
let interval

const startCounting = () => {
	clearInterval(interval)
	interval = setInterval(() => {
		if (count.value < 1000) {
			count.value++
		} else {
			clearInterval(interval)
		}
	}, 50)
}

const stopCounting = () => {
	clearInterval(interval)
}

onMounted(() => {
	observer = new IntersectionObserver(
		([entry]) => {
			isVisible.value = entry.isIntersecting
			if (isVisible.value) {
				startCounting()
			} else {
				stopCounting()
			}
		},
		{
			root: null,
			rootMargin: '0px',
			threshold: 0.1,
		}
	)

	if (counterRef.value) {
		observer.observe(counterRef.value)
	}
})

onUnmounted(() => {
	if (observer && counterRef.value) {
		observer.unobserve(counterRef.value)
	}
	stopCounting()
})
</script>

<template>

	<div class="flex items-center justify-center h-64">
		<div ref="counterRef" class="p-8 rounded-lg shadow-lg">
			<transition
			>
				<div :key="count" class="text-7xl font-bold text-center text-blue-600">
					{{ count.toLocaleString() }}
				</div>
			</transition>
		</div>
	</div>
</template>

<style scoped>

</style>