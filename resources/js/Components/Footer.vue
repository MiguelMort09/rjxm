<script lang="ts" setup>
import {usePage} from '@inertiajs/vue3';
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faFacebook, faInstagram} from "@fortawesome/free-brands-svg-icons";

const {APP_LOGO, APP_DIRECTION, APP_PHONE, APP_EMAIL, FACEBOOK_URL, INSTAGRAM_URL} = usePage().props;

</script>

<template>
	<section class="container mx-auto px-4 py-8">
		<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-12">
			<div class="justify-items-start">
				<div class="w-full justify-items-center">
					<img :src="APP_LOGO" alt="Logo RJxM" class="object-cover size-1/2">
				</div>
			</div>
			<div>
				<h4 class="mb-4 font-bold uppercase text-white">Dirección</h4>
				<p class="text-white font-semibold text-justify text-sm">{{ APP_DIRECTION }}</p>
			</div>
			<div>
				<h4 class="mb-4 font-bold uppercase text-white">Contacto</h4>
				<p class="text-white font-semibold text-justify text-sm">{{ APP_PHONE }}</p>
				<p class="text-white font-semibold text-justify text-sm">{{ APP_EMAIL }}</p>
			</div>
			<div>
				<h4 class="mb-4 font-bold uppercase text-white">Enlaces</h4>
				<div class="flex space-x-4 text-white text-xl">
					<a :href="FACEBOOK_URL">
						<FontAwesomeIcon :icon="faFacebook" size="lg"/>
					</a>
					<a :href="INSTAGRAM_URL">
						<FontAwesomeIcon :icon="faInstagram" size="lg"/>
					</a>
				</div>
			</div>
		</div>
	</section>

</template>
