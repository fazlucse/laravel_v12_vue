<script setup>
import IndexLayout from './Layouts/Index.vue';
import HomeSection from './home.vue';
import AboutSection from './about.vue';
import ProjectSection from './project.vue';
import ContactSection from './contact.vue';
defineProps({
    totalVisits: Number
})
</script>

<template>
    <IndexLayout>
        <HomeSection />
        <AboutSection />
        <ProjectSection />
        <ContactSection />
    </IndexLayout>
</template>
