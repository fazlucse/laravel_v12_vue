<template>
    <section
        id="home"
        class="py-20 bg-gradient-to-r from-green-400 to-blue-500"
        aria-labelledby="hero-heading"
    >
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <!-- Text block -->
                <div class="md:w-1/2">
                    <h1
                        id="hero-heading"
                        class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight"
                    >
                        Hi, I’m {{ name }}
                    </h1>
                    <h2 class="text-2xl md:text-3xl font-semibold text-white mb-6">
                        {{ title }}
                    </h2>
                    <p class="text-white mb-8 text-lg leading-relaxed">
                        {{ description }}
                    </p>
                    <a
                        href="#contact"
                        class="inline-block bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300"
                        aria-label="Scroll to contact section"
                    >
                        Contact Me
                    </a>
                </div>

                <!-- Profile image -->
                <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
                    <div
                        class="w-64 h-64 md:w-80 md:h-80 bg-white rounded-full overflow-hidden shadow-xl"
                    >
                        <img
                            :src="`${imageUrl}images/user-photo/fazlu.jpg`"
                            :alt="`Photo of ${name}`"
                            class="w-full h-full "
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue'; // Import computed

defineProps({
    name: {
        type: String,
        default: "Fazlur Rahman",
    },
    title: {
        type: String,
        default: "Sr. Software Engineer",
    },
    description: {
        type: String,
        default:
            "Full-Stack Specialist | Building Scalable Apps with Pixel-Perfect Precision.",
    },
    imageUrl: {
        type: String,
        default:
            "import.meta.env.BASE_URL}images/fazlu.jpg",
    },
});
const imageUrl = computed(() => {
    console.log(import.meta.env);
    return `${import.meta.env.VITE_APP_DI_URL}`;
});
</script>

<style scoped>
/* nothing here for now – all styling via Tailwind */
</style>
