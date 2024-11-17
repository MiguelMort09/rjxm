<script setup>
import Navigation from "@/Components/Navigation.vue";
import NavLink from "@/Components/NavLink.vue";
import {Link} from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
	<div class="min-h-screen w-full content-center">
		<Navigation>
			<Link :href="route('dashboard')">
				<ApplicationLogo class="max-h-full"/>
			</Link>
			<NavLink :active="route().current('home')" :href="route('home')">
				Inicio
			</NavLink>
			<div class="space-x-2">
				<NavLink :active="route().current('login')" :href="route('login')">
					Iniciar Sesión
				</NavLink>
				<NavLink :active="route().current('register')" :href="route('register')">
					Registro
				</NavLink>
			</div>
		</Navigation>
		<main class="w-full bg-red-500">
			<slot/>
		</main>
	</div>
</template>
