<template>
    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">About Me</h2>
            <div class="md:flex md:items-start gap-12">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Who I Am</h3>
                    <p class="text-gray-600 mb-6">{{about}}</p>

                    <h3 class="text-2xl font-semibold text-gray-700 mb-4 mt-8">Core Expertise</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div v-for="(skill, index) in coreSkills" :key="index" class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">{{ skill }}</span>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Technical Skills</h3>
                    <div class="flex flex-wrap gap-3">
                        <div v-for="(skill, index) in technicalSkills" :key="index"
                             class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            {{ skill }}
                        </div>
                    </div>

                    <div class="mt-12">
                        <h3 class="text-2xl font-semibold text-gray-700 mb-4">Specializations</h3>
                        <div class="flex flex-wrap gap-2">
                            <span v-for="(spec, index) in specializations" :key="index"
                                  class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                {{ spec }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineOptions({
    name: 'AboutSection'
})

const coreSkills = [
    'Full-Stack Development',
    'ERP Systems Development',
    'Business Process Automation',
    'Mobile Apps (Flutter & Ionic)',
    'JavaScript Frameworks',
    'Database Architecture',
    'API Design & Integration',
    'Agile Development',
    'Server Configuration',
    'Performance Optimization',
    'Cross-Platform Solutions',
    'Technical Leadership',
    'Project Management'
];

const technicalSkills = [
    'Laravel/PHP',
    'Vue.js/Angular',
    'JavaScript/jQuery',
    'Flutter/Ionic',
    'MySQL/PostgreSQL',
    'Tailwind CSS',
    'RESTful APIs',
    'Git Version Control',
    'Linux Server Management',
    'Docker',
    'Git',
    // 'CI/CD Pipelines'
];

const specializations = [
    'Buying House ERP Systems',
    'Custom Business Solutions',
    'Cross-Platform Development',
    'Web Application Architecture',
    'Database Optimization'
];

defineProps({
    about: {
        type: String,
        default: "Senior Full-Stack Developer with 8 years of experience specializing in ERP system development for buying houses and cross-platform mobile applications. I combine deep expertise in Laravel/PHP with modern JavaScript frameworks to deliver comprehensive business solutions. My focus is on creating efficient, scalable systems that streamline operations and drive business growth.",
    },
    title: {
        type: String,
        default: "Sr. Software Engineer",
    },
    description: {
        type: String,
        default: "ERP Solutions Architect | Full-Stack Development Specialist",
    },
});
</script>

<style scoped>
/* Add any custom styles here if needed */
</style>
