<template>
    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">My Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                         alt="Project 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">E-commerce Website</h3>
                        <p class="text-gray-600 mb-4">A fully responsive e-commerce platform built with React and Tailwind CSS.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">React</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Tailwind</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Node.js</span>
                        </div>
                        <a href="#" class="text-green-500 font-semibold hover:text-green-700">View Project →</a>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1169&q=80"
                         alt="Project 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Task Management App</h3>
                        <p class="text-gray-600 mb-4">A productivity app for managing tasks with drag-and-drop functionality.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Vue.js</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Firebase</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Tailwind</span>
                        </div>
                        <a href="#" class="text-green-500 font-semibold hover:text-green-700">View Project →</a>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1136&q=80"
                         alt="Project 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Portfolio Template</h3>
                        <p class="text-gray-600 mb-4">A customizable portfolio template for creatives and developers.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">HTML</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">CSS</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">JavaScript</span>
                        </div>
                        <a href="#" class="text-green-500 font-semibold hover:text-green-700">View Project →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: 'ProjectsSection'
}
</script>
