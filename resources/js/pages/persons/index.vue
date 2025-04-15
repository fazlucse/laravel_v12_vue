

<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthLayout from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

defineProps({
    persons: Object,
});

const deletePerson = (id) => {
    if (confirm('Are you sure you want to delete this person?')) {
        router.delete(route('persons.destroy', id));
    }
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

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Persons</h1>
                <Link
                    :href="route('persons.create')"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"
                >
                    Add New Person
                </Link>
            </div>

            <!-- Person Table -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="person in persons.data" :key="person.id" class="border-b hover:bg-gray-50">
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
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="p-4 flex justify-center">
                    <nav class="flex items-center space-x-2">
                        <Link
                            v-for="(link, index) in persons.links"
                            :key="index"
                            :href="link.url || '#'"
                            :class="{
                'bg-blue-500 text-white': link.active,
                'text-gray-500 hover:text-gray-700': !link.active,
                'pointer-events-none opacity-50': !link.url
              }"
                            class="px-3 py-1 rounded"
                            v-html="link.label"
                        />
                    </nav>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

