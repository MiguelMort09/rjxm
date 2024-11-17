<script lang="ts" setup>
import {computed} from 'vue';
import {Link} from '@inertiajs/vue3';

const props = defineProps<{
	href: string;
	active?: boolean;
}>();

const classes = computed(() =>
	props.active
		? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
		:
		'inline-flex items-center px-1 pt-1 font-medium leading-5 text-white    focus:border-gray-300 transition duration-150 ease-in-out',
);
</script>

<template>
	<Link :class="classes" :href="href">
		<slot/>
	</Link>
</template>
