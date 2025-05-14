<script setup>
import { onMounted, ref } from 'vue';

const showMobileMenu = ref(false);
const activeSection = ref('home');

const toggleMobileMenu = () => {
    showMobileMenu.value = !showMobileMenu.value;
};

const scrollTo = (section) => {
    const element = document.getElementById(section);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
        
    }
    showMobileMenu.value = false;
    activeSection.value = section;
};

onMounted(() => {
    const sections = ['home', 'about', 'projects', 'contact'];

    const observer = new IntersectionObserver(
        (entries) => {
            for (const entry of entries) {
                if (entry.isIntersecting) {
                    activeSection.value = entry.target.id;
                }
            }
        },
        {
            threshold: 0.6,
        }
    );

    sections.forEach((id) => {
        const el = document.getElementById(id);
        if (el) observer.observe(el);
    });
});
</script>

<template>
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <span @click="scrollTo('home')" class="flex items-center py-4 px-2 cursor-pointer">
          <span class="font-semibold text-gray-500 text-lg">Portfolio</span>
        </span>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
          <span
              v-for="item in ['home', 'about', 'projects', 'contact']"
              :key="item"
              @click="scrollTo(item)"
              :class="[
              'py-4 px-2 font-semibold transition duration-300 cursor-pointer capitalize',
              activeSection === item ? 'nav-active text-green-500' : 'text-gray-500 hover:text-green-500'
            ]"
          >
            {{ item }}
          </span>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="toggleMobileMenu" class="outline-none">
                        <i class="fas fa-bars text-gray-500 text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div :class="['md:hidden', showMobileMenu ? 'block' : 'hidden']">
            <ul class="bg-white">
                <li v-for="item in ['home', 'about', 'projects', 'contact']" :key="item">
          <span
              @click="scrollTo(item)"
              class="block text-sm px-4 py-3 cursor-pointer transition duration-300 capitalize"
              :class="activeSection === item ? 'bg-green-100 text-green-600' : 'text-gray-600 hover:bg-green-100'"
          >
            {{ item }}
          </span>
                </li>
            </ul>
        </div>
    </nav>
</template>

<style scoped>
.nav-active {
    border-bottom: 2px solid #10B981;
}
</style>
