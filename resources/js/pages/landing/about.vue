<template>
    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">About Me</h2>
            <div class="md:flex md:items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Who I Am</h3>
                    <p class="text-gray-600 mb-4">I'm a passionate frontend developer with 5 years of experience building web applications. I specialize in React, Vue.js, and of course, Tailwind CSS!</p>
                    <p class="text-gray-600 mb-6">When I'm not coding, you can find me hiking, reading tech blogs, or experimenting with new web technologies.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-green-500">
                            <i class="fab fa-github text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-500">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-red-500">
                            <i class="fab fa-codepen text-2xl"></i>
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">My Skills</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-700">HTML/CSS</span>
                                <span class="text-gray-500">95%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-700">JavaScript</span>
                                <span class="text-gray-500">90%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-700">React</span>
                                <span class="text-gray-500">85%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-700">Tailwind CSS</span>
                                <span class="text-gray-500">92%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 92%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: 'AboutSection'
}
</script>
