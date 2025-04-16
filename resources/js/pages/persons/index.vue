<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import AuthLayout from '@/layouts/AuthLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

import { router } from '@inertiajs/vue3';
import { computed, onMounted,onUnmounted, ref } from 'vue';

const windowHeight = ref(window.innerHeight);

const updateWindowHeight = () => {
    windowHeight.value = window.innerHeight
};

onMounted(() => {
    window.addEventListener('resize', updateWindowHeight)
});

onUnmounted(() => {
    window.removeEventListener('resize', updateWindowHeight)
});

const tableHeightStyle = computed(() => {
    // Calculate height based on viewport minus header, filters, and pagination space
    const calculatedHeight = windowHeight.value - 280 // Adjust this value as needed
    return {
        'max-height': `${Math.max(calculatedHeight, 300)}px`, // Minimum height of 300px
        'min-height': '300px' // Ensure table is never too small
    }
});

const props = defineProps({
    persons: Object,
    perPage: {
        type: Number,
        default: 10
    }
});

const itemsPerPage = ref(props.perPage);

const deletePerson = (id) => {
    if (confirm('Are you sure you want to delete this person?')) {
        router.delete(route('persons.destroy', id));
    }
};

const handlePaginationClick = (url, event) => {
    if (!url) {
        event.preventDefault();
        return;
    }
};

const changePerPage = (value) => {
    itemsPerPage.value = value;
    router.get(route('persons.index', { per_page: value }), {}, {
        preserveState: true,
        replace: true
    });
};

const getSerialNumber = (index) => {
    return props.persons.current_page * props.persons.per_page - props.persons.per_page + index + 1;
};

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Persons" />

        <div class="container mx-auto px-4 py-6">
            <!-- Status Message -->
            <div v-if="$page.props.status" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ $page.props.status }}
            </div>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <h1 class="text-2xl font-bold">Persons</h1>

                <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                    <div class="flex items-center gap-2">
                        <label for="perPage" class="text-sm font-medium text-gray-700">Show:</label>
                        <select
                            id="perPage"
                            v-model="itemsPerPage"
                            @change="changePerPage($event.target.value)"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                        >
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="300">300</option>
                        </select>
                    </div>

                    <Link
                        :href="route('persons.create')"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-center"
                    >
                        Add New Person
                    </Link>
                </div>
            </div>

            <!-- Person Table -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="relative overflow-auto" :style="tableHeightStyle">
                <table class="min-w-full">
                        <thead class="bg-gray-100 sticky top-0 z-10">
                        <tr>
                            <th class="py-3 px-6 text-left bg-gray-100">S.L.</th>
                            <th class="py-3 px-6 text-left bg-gray-100">Name</th>
                            <th class="py-3 px-6 text-left bg-gray-100">Email</th>
                            <th class="py-3 px-6 text-left bg-gray-100">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(person, index) in persons.data" :key="person.id" class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6">{{ getSerialNumber(index) }}</td>
                            <td class="py-4 px-6">{{ person.name }}</td>
                            <td class="py-4 px-6">{{ person.email }}</td>
                            <td class="py-4 px-6 space-x-2">
                                <Link
                                    :href="route('persons.edit', person.id)"
                                    class="text-blue-500 hover:text-blue-700"
                                >
                                    Edit
                                </Link>
                                <button
                                    @click="deletePerson(person.id)"
                                    class="text-red-500 hover:text-red-700"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <tr v-if="persons.data.length === 0">
                            <td colspan="4" class="py-4 px-6 text-center text-gray-500">No persons found</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex flex-col md:flex-row justify-between items-center p-2 border-t">
                    <div class="mb-0 md:mb-0 text-sm text-gray-600">
                        Showing {{ persons.from }} to {{ persons.to }} of {{ persons.total }} entries
                    </div>

                    <nav class="flex space-x-1 bg-white p-2 rounded-lg shadow">
                        <Link
                            v-for="(link, index) in persons.links"
                            :key="index"
                            :href="link.url"
                            @click="handlePaginationClick(link.url, $event)"
                            :class="{
                                'bg-blue-500 text-white px-4 py-2 rounded': link.active,
                                'text-gray-700 hover:bg-gray-100 px-4 py-2 rounded': !link.active && link.url,
                                'text-gray-400 px-4 py-2 rounded cursor-not-allowed': !link.url
                            }"
                            v-html="link.label"
                            preserve-scroll
                            preserve-state
                            :only="['persons']"
                        />
                    </nav>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

html, body {
    overflow-y: hidden;
}

/* Table container styling */
.relative {
    overflow-y: auto;
    scrollbar-width: thin;
}

/* Custom scrollbar */
.relative::-webkit-scrollbar {
    width: 8px;
}

.relative::-webkit-scrollbar-thumb {
    background-color: #cbd5e0;
    border-radius: 4px;
}

/* Sticky header */
thead.sticky {
    position: sticky;
    top: 0;
    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
}

/* Responsive adjustments */
@media (max-width: 640px) {
    html, body {
        overflow-y: auto;
    }

    .relative {
        max-height: none;
        overflow-x: auto;
    }

    thead.sticky {
        position: static;
    }
}
/* Ensure links are visible */
.pagination-container a {
    display: inline-block;
    min-width: 2.5rem;
    text-align: center;
    text-decoration: none;
    transition: all 0.2s ease;
}

/* Make table responsive */
@media (max-width: 640px) {
    table {
        display: block;
        width: 100%;
        overflow-x: auto;
    }

    .overflow-x-auto {
        max-height: none;
    }
}
</style>
