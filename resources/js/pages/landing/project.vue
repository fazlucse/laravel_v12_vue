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
                        :src="project.image"
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
                        <a
                            :href="project.link"
                            class="text-green-500 font-semibold hover:text-green-700"
                        >
                            View Project →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    projects: {
        type: Array,
        required: true,
        default: () => [
            {
                title: "Buying House ERP",
                description: "Buying House ERP streamlines buying house operations with efficient management of procurement, inventory, accounts, and payroll. ",
                image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80",
                tags: ["PHP", "JavaScript", "jQuery","CSS","MySQL"],
                link: "#"
            },
            {
                title: "Task Management App",
                description: "A productivity app for managing tasks with drag-and-drop functionality.",
                image: "https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1169&q=80",
                tags: ["Vue.js", "Firebase", "Tailwind"],
                link: "#"
            },
            {
                title: "Portfolio Template",
                description: "A customizable portfolio template for creatives and developers.",
                image: "https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1136&q=80",
                tags: ["HTML", "CSS", "JavaScript"],
                link: "#"
            }
        ]
    }
});
</script>
