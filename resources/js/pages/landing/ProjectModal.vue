

<template>
    <div class="fixed inset-0 bg-black bg-opacity-10 flex items-center justify-center z-50">
        <div
            class="bg-white rounded-lg shadow-lg max-w-5xl w-full max-h-[90vh] mx-auto relative flex flex-col"
            style="height: 90vh;"
        >
            <div
                class="sticky top-0 bg-white px-4 py-2 border-b   border-gray-300 z-20 flex justify-between items-center"
            >
                <h3 class="text-lg font-semibold text-gray-800 ">
                    Project Details
                </h3>
                <button
                    @click="$emit('close')"
                    class="text-gray-500 hover:text-black cursor-pointer"
                    aria-label="Close modal"
                >
                    ✕
                </button>
            </div>

            <!-- Scrollable content -->
            <div class="overflow-y-auto px-6 py-4 flex-1">
                <!-- Sticky Header with background -->
                <div
                    class="bg-white pt-4 pb-4 mb-6 border-b border-gray-300 z-30"
                    style="backdrop-filter: blur(10px);"
                >
                    <h2 class="text-2xl font-bold mb-2">{{ project.title }}</h2>
                    <p class="text-gray-700">{{ project.description }}</p>

                    <div class="mt-4 flex flex-wrap gap-2">
            <span
                v-for="(tag, index) in project.tags"
                :key="index"
                class="bg-green-100 text-green-800 px-2 py-1 text-sm rounded"
            >
              {{ tag }}
            </span>
                    </div>

                    <div class="grid grid-cols-4 gap-3 mt-4">
                        <img
                            v-for="(img, index) in project.images"
                            :key="index"
                            :src="img"
                            class="w-full h-full object-cover rounded"
                            :alt="`Image ${index + 1}`"
                        />
                    </div>
                </div>

                <!-- Core Modules and Features -->
                <div v-if="project.coreModules && project.coreModules.length">
                    <h3 class="text-xl font-semibold mb-3">Core Modules</h3>
                    <div v-for="(module, idx) in project.coreModules" :key="idx" class="mb-6">
                        <h4 class="font-bold text-lg mb-1">{{ module.title }}</h4>
                        <p class="text-gray-600 mb-2">{{ module.description }}</p>
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            <li v-for="(feature, fidx) in module.features" :key="fidx">
                                {{ feature }}
                            </li>
                        </ul>
                        <div v-if="module.ledgerBase && module.ledgerBase.length" class="mt-3">
                            <h5 class="font-semibold text-gray-800 mb-1">Ledger Base Features:</h5>
                            <ul class="list-disc list-inside text-gray-600 space-y-1">
                                <li v-for="(item, i) in module.ledgerBase" :key="i">{{ item }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    project: Object,
})
</script>

