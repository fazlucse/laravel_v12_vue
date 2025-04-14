<script setup>
import { computed } from "vue";

const props = defineProps({
    category: String,
    people: Array, // The entire people list (fetched from backend)
});

// Compute category-specific and total counts
const totalPeople = computed(() => props.people.length);
const categoryPeople = computed(() =>
    props.people.filter((p) => p.category === props.category).length
);
</script>

<template>
    <div class="relative bg-zinc-900 shadow-lg rounded-3xl overflow-hidden border border-zinc-800  cursor-pointer">
        <!-- Background Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-zinc-900 to-black opacity-70 blur-sm"></div>

        <!-- Content -->
        <div class="relative z-10 p-8">
            <!-- Category Title -->
            <h2 class="text-2xl font-bold text-white mb-4 tracking-wide">
                {{ category }}
            </h2>

            <!-- Stats Section -->
            <div class="flex flex-col gap-4">
                <!-- Category-Specific Count -->
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-zinc-400">People in {{ category }} Category:</span>
                    <span class="text-xl font-bold text-zinc-100">{{ categoryPeople }}</span>
                </div>

                <!-- Total People Count -->
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-zinc-400">Total People:</span>
                    <span class="text-xl font-bold text-zinc-100">{{ totalPeople }}</span>
                </div>

                <!-- Total People Count -->
                <div class="flex justify-between items-center">
                    <span class="text-sm font-medium text-zinc-400">Total in other categories:</span>
                    <span class="text-xl font-bold text-zinc-100">{{ totalPeople - categoryPeople }}</span>
                </div>
            </div>

            <!-- Decorative Line -->
            <div class="w-full h-px bg-gradient-to-r from-transparent via-zinc-700 to-transparent my-6"></div>

            <!-- Action Button -->
            <!-- <button class="w-full py-3 rounded-lg bg-gradient-to-r from-zinc-700 to-zinc-800 text-white font-medium hover:from-zinc-600 hover:to-zinc-700 transition-all duration-300">
                View Details
            </button> -->
        </div>
    </div>
</template>
