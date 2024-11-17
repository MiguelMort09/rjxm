<template>
	<img :src="APP_LOGO" alt="Logo" class="h-10 object-cover"/>
</template>

<script setup>
import {usePage} from '@inertiajs/vue3';

const {APP_LOGO} = usePage().props;
</script>