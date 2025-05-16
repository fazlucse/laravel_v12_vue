<template>
    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">My Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Dynamic Projects -->
                <div
                    v-for="(project, index) in projects"
                    :key="index"
                    class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300"
                >
                    <img
                        :src="project.images[0]"
                        :alt="project.title"
                        class="w-full h-48 object-cover"
                    >
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ project.title }}</h3>
                        <p class="text-gray-600 mb-4">{{ project.description }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
              <span
                  v-for="(tag, tagIndex) in project.tags"
                  :key="tagIndex"
                  class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded"
              >
                {{ tag }}
              </span>
                        </div>
                        <a  @click="openProject(project)"
                           class="text-green-500 font-semibold hover:text-green-700 cursor-pointer">
                            View Project →
                        </a>
                    </div>
                </div>
            </div>
            <ProjectModal
                v-if="showDetails"
                :project="selectedProject"
                @close="showDetails = false"
            />
        </div>
    </section>
</template>

<script setup>
import ProjectModal from './ProjectModal.vue'
import { ref } from 'vue'
const showDetails = ref(false)
const selectedProject = ref(null)

function openProject(project) {
    selectedProject.value = project
    showDetails.value = true
}

defineProps({
    projects: {
        type: Array,
        required: true,
        default: () => [
            {
                title: "Buying House ERP",
                description: "Buying House ERP streamlines buying house operations with efficient management of procurement, inventory, accounts, and payroll. ",
                images: ["https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80"],
                tags: ["PHP", "JavaScript", "jQuery","CSS","MySQL"],
                link: "#"
            },
            {
                title: "Point of Sale (POS) System",
                description: "Retail POS System - A comprehensive solution for managing inventory, sales transactions, payments, and invoice generation for retail businesses.",
                images: ["https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80"],
                tags: ["Laravel/PHP", "JavaScript","jQuery","CSS","HTML", "MySQL"],
                link: "#"
            },
            {
                title: "Accounting Software",
                description: "Developed a comprehensive accounting software solution to manage financial transactions, handle payables and receivables, generate invoices, track payments, and produce detailed financial reports tailored for small businesses and individual users.",
                images: ["https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1136&q=80"],
                tags: ["Laravel/PHP","MySQL","Vue","HTML", "CSS"],
                link: "#"
            },
            {
                title: "E-commerce Platforms",
                description: "Comprehensive online store solution with multi-vendor support, advanced analytics, and integrated payment processing.",
                images: ["https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1136&q=80"],
                tags: ["Laravel/PHP","MySQL","JavaScript","jQuery","HTML", "CSS"],
                link: "#"
            },
            {
                title: "Bhutan Waste Bank (BWB App)",
                description: "A mobile application developed to support waste management efforts in Bhutan. The app enables\n" +
                    "users to register, complete OTP verification, submit trash, track the value of their waste in real-\n" +
                    "time, track driver locations, and redeem collection activities efficiently. Built with Flutter for the\n" +
                    "frontend and Laravel for backend API services.",
                images: [
                    "https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1136&q=80",
                    "https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1136&q=80",
                ],
                tags: ["Flutter (Mobile)"," Laravel (API)","MySQL (Database)"],
                link: "#"
            },
            {
                title: "Buying House Quality Inspection App",
                description: "A mobile application designed for garment quality inspectors to record inspection data directly\n" +
                    "from factories. Features include offline data synchronization, defect capturing, and automated\n" +
                    "report generation. Developed with a focus on field usability and reliability.",
                images: [
                    `${import.meta.env.VITE_APP_DI_URL}images/projects/s1.jpg`,
                    `${import.meta.env.VITE_APP_DI_URL}images/projects/s2.jpg`,
                    `${import.meta.env.VITE_APP_DI_URL}images/projects/s3.jpg`,
                    `${import.meta.env.VITE_APP_DI_URL}images/projects/s4.jpg`,
                    `${import.meta.env.VITE_APP_DI_URL}images/projects/s5.jpg`,
                ],
                tags: ["Flutter & Ionic (Mobile)"," Laravel (API)","MySQL (Database)"],
                link: "#"
            }
        ]
    },
    project: Object
});

</script>
