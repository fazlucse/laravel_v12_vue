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
    <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
        <div class="relative bg-zinc-900 h-full w-full">
            <!-- Background Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-zinc-900 to-black opacity-70 blur-sm"></div>

            <!-- Content -->
            <div class="relative z-10 p-8 h-full flex flex-col justify-center">
                <!-- Category Title -->
                <h2 class="text-2xl font-bold text-white mb-4 tracking-wide">
                    {{ category }}
                </h2>

                <!-- Stats Section -->
                <div class="flex flex-col gap-4">
                    <!-- Category-Specific Count -->
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-zinc-400">People in {{ category }}:</span>
                        <span class="text-xl font-bold text-zinc-100">{{ categoryPeople }}</span>
                    </div>

                    <!-- Total People Count -->
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-zinc-400">Total People:</span>
                        <span class="text-xl font-bold text-zinc-100">{{ totalPeople }}</span>
                    </div>

                    <!-- Others Count -->
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-zinc-400">In other categories:</span>
                        <span class="text-xl font-bold text-zinc-100">{{ totalPeople - categoryPeople }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>
