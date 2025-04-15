<!--<script setup lang="ts">-->
<!--import Breadcrumbs from '@/components/Breadcrumbs.vue';-->
<!--import { SidebarTrigger } from '@/components/ui/sidebar';-->
<!--import type { BreadcrumbItemType } from '@/types';-->

<!--defineProps<{-->
<!--    breadcrumbs?: BreadcrumbItemType[];-->
<!--}>();-->
<!--</script>-->

<!--<template>-->
<!--    <header-->
<!--        class="flex h-16 shrink-0 items-center gap-2 border-b border-sidebar-border/70 px-6 transition-[width,height] ease-linear group-has-data-[collapsible=icon]/sidebar-wrapper:h-12 md:px-4"-->
<!--    >-->
<!--        <div class="flex items-center gap-2">-->
<!--            <SidebarTrigger class="-ml-1" />-->
<!--            <template v-if="breadcrumbs.length > 0">-->
<!--                <Breadcrumbs :breadcrumbs="breadcrumbs" />-->
<!--            </template>-->
<!--        </div>-->
<!--    </header>-->
<!--</template>-->

<script setup lang="ts">
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { SidebarTrigger } from '@/components/ui/sidebar';
import type { BreadcrumbItemType } from '@/types';
import { ref } from 'vue';
import { User, LogOut, Settings } from 'lucide-vue-next';

defineProps<{
    breadcrumbs?: BreadcrumbItemType[];
}>();

const isUserMenuOpen = ref(false);
</script>

<template>
    <header
        class="flex h-16 shrink-0 items-center justify-between gap-2 border-b border-sidebar-border/70 px-6 transition-[width,height] ease-linear group-has-data-[collapsible=icon]/sidebar-wrapper:h-12 md:px-4"
    >
        <!-- Left side - Breadcrumbs and sidebar trigger -->
        <div class="flex items-center gap-2">
            <SidebarTrigger class="-ml-1" />
            <template v-if="breadcrumbs && breadcrumbs.length > 0">
                <Breadcrumbs :breadcrumbs="breadcrumbs" />
            </template>
        </div>

        <!-- Right side - User profile dropdown -->
        <div class="relative">
            <button
                @click="isUserMenuOpen = !isUserMenuOpen"
                class="flex items-center gap-2 rounded-full p-1 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
            >
                <div class="h-8 w-8 rounded-full bg-gray-300 dark:bg-gray-600 overflow-hidden">
                    <!-- Replace with actual user image if available -->
                    <div class="h-full w-full flex items-center justify-center text-gray-700 dark:text-gray-300">
                        <User class="h-5 w-5" />
                    </div>
                </div>
                <span class="sr-only">User menu</span>
            </button>

            <!-- Dropdown menu -->
            <div
                v-if="isUserMenuOpen"
                @click.away="isUserMenuOpen = false"
                class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white dark:bg-gray-800 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
            >
                <div class="py-1">
                    <a
                        href="#"
                        class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700"
                    >
                        <User class="h-4 w-4 mr-2" />
                        Profile
                    </a>
                    <a
                        href="#"
                        class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700"
                    >
                        <Settings class="h-4 w-4 mr-2" />
                        Settings
                    </a>
                    <a
                        href="#"
                        class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700"
                    >
                        <LogOut class="h-4 w-4 mr-2" />
                        Sign out
                    </a>
                </div>
            </div>
        </div>
    </header>
</template>
