<!--<script setup lang="ts">-->
<!--import NavFooter from '@/components/NavFooter.vue';-->
<!--import NavMain from '@/components/NavMain.vue';-->
<!--import NavUser from '@/components/NavUser.vue';-->
<!--import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';-->
<!--import { type NavItem } from '@/types';-->
<!--import { Link } from '@inertiajs/vue3';-->
<!--import { BookOpen, Folder, LayoutGrid } from 'lucide-vue-next';-->
<!--import AppLogo from './AppLogo.vue';-->

<!--const mainNavItems: NavItem[] = [-->
<!--    {-->
<!--        title: 'Dashboard',-->
<!--        href: '/dashboard',-->
<!--        icon: LayoutGrid,-->
<!--    },-->
<!--    {-->
<!--        title: 'Dashboard 2',-->
<!--        href: '/dashboard',-->
<!--        icon: LayoutGrid,-->
<!--    },-->
<!--    {-->
<!--        title: 'Dashboard 3',-->
<!--        href: '/dashboard',-->
<!--        icon: LayoutGrid,-->
<!--    },-->
<!--];-->

<!--const footerNavItems: NavItem[] = [-->
<!--    {-->
<!--        title: 'Github Repo',-->
<!--        href: 'https://github.com/laravel/vue-starter-kit',-->
<!--        icon: Folder,-->
<!--    },-->
<!--    {-->
<!--        title: 'Documentation',-->
<!--        href: 'https://laravel.com/docs/starter-kits',-->
<!--        icon: BookOpen,-->
<!--    },-->
<!--];-->
<!--</script>-->

<!--<template>-->
<!--    <Sidebar collapsible="icon" variant="inset">-->
<!--        <SidebarHeader>-->
<!--            <SidebarMenu>-->
<!--                <SidebarMenuItem>-->
<!--                    <SidebarMenuButton size="lg" as-child>-->
<!--                        <Link :href="route('dashboard')">-->
<!--                            <AppLogo />-->
<!--                        </Link>-->
<!--                    </SidebarMenuButton>-->
<!--                </SidebarMenuItem>-->
<!--            </SidebarMenu>-->
<!--        </SidebarHeader>-->

<!--        <SidebarContent>-->
<!--            <NavMain :items="mainNavItems" />-->
<!--        </SidebarContent>-->

<!--        <SidebarFooter>-->
<!--            <NavFooter :items="footerNavItems" />-->
<!--            <NavUser />-->
<!--        </SidebarFooter>-->
<!--    </Sidebar>-->
<!--    <slot />-->
<!--</template>-->
<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid, ChevronDown, ChevronRight } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import { ref } from 'vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Dashboard 2',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Person',
        href: '/persons.index',
        icon: LayoutGrid,
    },
    {
        title: 'Features',
        icon: LayoutGrid,
        children: [
            {
                title: 'Option 1',
                href: '/option1',
                icon: ChevronRight,
            },
            {
                title: 'Option 2',
                href: '/option2',
                icon: ChevronRight,
            }
        ]
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Github Repo',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits',
        icon: BookOpen,
    },
];

// Track expanded dropdown state
const expandedDropdown = ref<string | null>(null);

const toggleDropdown = (title: string) => {
    expandedDropdown.value = expandedDropdown.value === title ? null : title;
};
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <SidebarMenu>
                <template v-for="item in mainNavItems" :key="item.title">
                    <SidebarMenuItem>
                        <SidebarMenuButton
                            :as-child="!item.children"
                            @click="item.children ? toggleDropdown(item.title) : null"
                        >
                            <Link v-if="!item.children" :href="item.href" class="flex items-center gap-2">
                                <component :is="item.icon" class="h-4 w-4" />
                                <span>{{ item.title }}</span>
                            </Link>

                            <div v-else class="flex items-center justify-between w-full">
                                <div class="flex items-center gap-2">
                                    <component :is="item.icon" class="h-4 w-4" />
                                    <span>{{ item.title }}</span>
                                </div>
                                <component
                                    :is="expandedDropdown === item.title ? ChevronDown : ChevronRight"
                                    class="h-4 w-4"
                                />
                            </div>
                        </SidebarMenuButton>

                        <div
                            v-if="item.children && expandedDropdown === item.title"
                            class="ml-6 mt-1 space-y-1"
                        >
                            <SidebarMenuItem v-for="child in item.children" :key="child.title">
                                <SidebarMenuButton as-child>
                                    <Link :href="child.href" class="flex items-center gap-2">
                                        <component :is="child.icon" class="h-4 w-4" />
                                        <span>{{ child.title }}</span>
                                    </Link>
                                </SidebarMenuButton>
                            </SidebarMenuItem>
                        </div>
                    </SidebarMenuItem>
                </template>
            </SidebarMenu>
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
