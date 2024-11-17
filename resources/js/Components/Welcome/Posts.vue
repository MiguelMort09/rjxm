<!--<script lang="ts" setup>-->
<!--import {onMounted, ref} from 'vue';-->
<!--import Card from "@/Components/Card.vue";-->
<!--import axios from "axios";-->

<!--const posts = ref([]);-->
<!--const postFeatured = ref(Object);-->
<!--const hoveredId = ref(null);-->
<!--const isVisible = ref(false);-->

<!--const observer = new IntersectionObserver(-->
<!--	([entry]) => {-->
<!--		isVisible.value = entry.isIntersecting-->
<!--	}-->
<!--)-->

<!--const loadPosts = async () => {-->
<!--	await axios.get(route('posts.index'), {-->
<!--		params: {-->
<!--			limit: 4,-->
<!--		}-->
<!--	}).then((res) => {-->
<!--		let data = res.data;-->
<!--		postFeatured.value = data.featured;-->
<!--		posts.value = data.posts;-->
<!--	});-->
<!--};-->

<!--onMounted(() => {-->
<!--	loadPosts();-->
<!--});-->

<!--</script>-->
<!--<template>-->
<!--	<section>-->
<!--		<div class="container mx-auto px-4 pt-8">-->
<!--			<h2 class=" text-3xl font-bold mb-6">Últimas Noticias</h2>-->
<!--		</div>-->
<!--		<div class="bg-white shadow-2xl">-->
<!--			<div class="container mx-auto px-2 md:px-4 py-6">-->
<!--				<div class="md:flex md:divide-x md:divide-blue-950">-->
<!--					<div class="hidden md:block basis-1/2 px-6">-->
<!--						<img-->
<!--							:alt="postFeatured.title"-->
<!--							:src="postFeatured.cover_image"-->
<!--							class="w-full object-cover rounded-md mb-2"-->
<!--						/>-->
<!--					</div>-->
<!--					<div class="md:basis-1/2  px-4 md:px-6">-->
<!--						<div class="w-full h-full flex flex-col justify-between pb-4">-->
<!--							<h3 class="text-xl md:text-3xl font-bold text-center mb-6">-->
<!--								{{ postFeatured.title }}-->
<!--							</h3>-->
<!--							<div class="md:hidden ">-->
<!--								<img-->
<!--									:alt="postFeatured.title"-->
<!--									:src="postFeatured.cover_image"-->
<!--									class="w-full object-cover rounded-md mb-2"-->
<!--								/>-->
<!--							</div>-->
<!--							<div class="flex-1 text-sm md:text-base text-justify overflow-hidden" v-html="postFeatured.description">-->
<!--							</div>-->
<!--							<div class="w-full text-sm md:text-base justify-items-end">-->
<!--								<p class="text-md font-semibold text-neutral-800">-->
<!--									{{ postFeatured.updated_at }}-->
<!--								</p>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="container mx-auto mt-8 px-4 py-8">-->
<!--			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">-->
<!--				<div v-for="post in posts"-->
<!--					 :key="post.slug"-->
<!--				>-->
<!--					<a :href="route('posts.show', post.slug)" class="block h-full" @mouseenter="hoveredId = post.id" @mouseleave="hoveredId = null"-->
<!--					>-->
<!--						<Card :title="post.title">-->
<!--							<div class="w-full flex md:flex-col gap-6 md:gap-0">-->
<!--								<div class="w-full">-->
<!--									<img-->
<!--										:alt="post.title"-->
<!--										:src="post.cover_image"-->
<!--										class="w-full h-40 object-cover rounded-md mb-2"-->
<!--									/>-->
<!--								</div>-->
<!--							</div>-->
<!--							<div class="w-full">-->
<!--								<div class="content-notice" v-html="post.description">-->
<!--								</div>-->

<!--								<div class="w-full justify-items-end">-->
<!--									<p class="text-sm mt-3 font-semibold text-neutral-800">-->
<!--										{{ post.updated_at }}-->
<!--									</p>-->
<!--								</div>-->
<!--							</div>-->
<!--						</Card>-->
<!--					</a>-->
<!--				</div>-->
<!--			</div>-->

<!--			<div class="py-4 md:py-8 text-lg font-semibold transition hover:-translate-y-1 ease-out w-full text-right align-baseline">-->
<!--				<a class="block h-full" href="#">-->
<!--					Ver más publicaciones →-->
<!--				</a>-->
<!--			</div>-->
<!--		</div>-->
<!--	</section>-->
<!--</template>-->
<!--<style scoped>-->

<!--</style>-->

<script lang="ts" setup>
import {onMounted, ref} from 'vue';
import Card from "@/Components/Card.vue";
import axios from "axios";

const posts = ref([]);
const postFeatured = ref({});
const hoveredId = ref(null);
const postIsVisible = ref(false);
const postsIsVisible = ref(false);

const observer = new IntersectionObserver(([entry]) => {
	if (entry.target.id === 'featured-section' && entry.isIntersecting) {
		console.log(entry.target.id);
		postIsVisible.value = entry.isIntersecting;
	} else if (entry.target.id === 'posts-section' && entry.isIntersecting) {
		console.log(entry.target.id);
		postsIsVisible.value = entry.isIntersecting;
	}
}, {threshold: 0.2});

const loadPosts = async () => {
	try {
		const {data} = await axios.get(route('posts.index'), {params: {limit: 4}});
		postFeatured.value = data.featured;
		posts.value = data.posts;
	} catch (error) {
		console.error("Error loading posts:", error);
	}
};

onMounted(() => {
	loadPosts();
	const section = document.querySelector("#featured-section");
	if (section) observer.observe(section);
	const postsSection = document.querySelector("#posts-section");
	if (postsSection) observer.observe(postsSection);
});
</script>

<template>
	<section>
		<div class="container mx-auto px-4 pt-8">
			<h2 class="text-3xl font-bold mb-6">Últimas Noticias</h2>
		</div>

		<div
			id="featured-section"
			:class="{ 'opacity-0 translate-y-8': !postIsVisible, 'opacity-100 translate-y-0': postIsVisible }"
			class="bg-white shadow-2xl transition-all duration-700 ease-out"
		>
			<div class="container mx-auto px-4 py-6">
				<div class="flex flex-col md:flex-row md:divide-x md:divide-blue-950 gap-4">
					<div v-if="postFeatured.cover_image" class="hidden md:block md:w-1/2 px-6">
						<img
							:alt="postFeatured.title"
							:src="postFeatured.cover_image"
							class="w-full h-full object-cover rounded-md mb-2 transition-transform duration-500 hover:scale-105"
						/>
					</div>
					<div class="md:w-1/2 px-4 md:px-6">
						<div class="flex flex-col justify-between h-full pb-4">
							<h3 class="text-xl md:text-3xl font-bold text-center mb-6">
								{{ postFeatured.title }}
							</h3>
							<div v-if="postFeatured.cover_image" class="md:hidden">
								<img
									:alt="postFeatured.title"
									:src="postFeatured.cover_image"
									class="w-full object-cover rounded-md mb-2"
								/>
							</div>
							<div class="flex-1 text-sm md:text-base text-justify overflow-hidden" v-html="postFeatured.description"></div>
							<p class="text-md font-semibold text-neutral-800 mt-4">
								{{ postFeatured.updated_at }}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="posts-section"
			 class="container mx-auto mt-8 px-4 py-8">
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
				<div
					v-for="post in posts"
					:key="post.slug"
				>
					<a
						:href="route('posts.show', post.slug)"
						class="block h-full"
						@mouseenter="hoveredId = post.id"
						@mouseleave="hoveredId = null"
					>
						<Card :class="{ 'opacity-0 translate-y-8': !postsIsVisible, 'opacity-100 translate-y-0': postsIsVisible }" :title="post.title"
							  class="bg-white shadow-2xl transition-all duration-700 ease-out">
							<div class="flex flex-col gap-4">
								<img
									:alt="post.title"
									:src="post.cover_image"
									class="w-full h-40 object-cover rounded-md mb-2 transition-transform duration-500 hover:scale-105"
								/>
								<div class="content-notice" v-html="post.description"></div>
								<p class="text-sm font-semibold text-neutral-800 mt-3">
									{{ post.updated_at }}
								</p>
							</div>
						</Card>
					</a>
				</div>
			</div>

			<div class="py-4 md:py-8 text-lg font-semibold transition-transform duration-500 ease-out w-full text-right">
				<a class="inline-block transform hover:translate-x-2" href="#">
					Ver más publicaciones →
				</a>
			</div>
		</div>
	</section>
</template>