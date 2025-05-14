<template>
    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Get In Touch</h2>
            <div class="md:flex md:space-x-8">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Contact Information</h3>
                    <p class="text-gray-600 mb-6">Feel free to reach out if you're looking for a developer, have a question, or just want to connect.</p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-green-500 mr-4 text-xl"></i>
                            <span class="text-gray-600">john.doe@example.com</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-green-500 mr-4 text-xl"></i>
                            <span class="text-gray-600">+1 (555) 123-4567</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-green-500 mr-4 text-xl"></i>
                            <span class="text-gray-600">San Francisco, CA</span>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <form class="space-y-4">
                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Name</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="message" class="block text-gray-700 mb-2">Message</label>
                            <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                        </div>
                        <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition duration-300 w-full">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'ContactSection'
}
</script>
