<template>
    <div class="fixed inset-0   bg-black bg-opacity-10 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl w-full  max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative overflow-y-auto max-h-[90vh]">
            <button @click="$emit('close')" class="absolute top-2 right-2 text-gray-500 hover:text-black cursor-pointer">✕</button>
            <h2 class="text-2xl font-bold mb-4">{{ project.title }}</h2>
            <p class="text-gray-700 mb-4">{{ project.description }}</p>
            <div class="mt-4 flex flex-wrap gap-2">
        <span
            v-for="(tag, index) in project.tags"
            :key="index"
            class="bg-green-100  gap-3 mb-4 text-green-800 px-2 py-1 text-sm rounded"
        >
          {{ tag }}
        </span>

            </div>
            <div class="grid grid-cols-4 gap-3 mb-4">
                <img
                    v-for="(img, index) in project.images"
                    :key="index"
                    :src="img"
                    class=" w-full h-100"
                    :alt="`Image ${index + 1}`"
                />
            </div>


        </div>
    </div>
</template>

<script setup>
defineProps({
    project: Object
})
</script>
