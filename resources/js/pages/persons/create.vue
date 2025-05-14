<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="bg-gray-50 py-5 px-0 sm:px-5 lg:px-5">
            <div class="w-full mx-auto">
                <div class="min-h-[82vh] bg-white py-0 px-0 sm:px-5">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-extrabold text-gray-900">Add New Contact</h2>
                    </div>
                    <form @submit.prevent="handleSubmit" class="w-full mx-auto md:w-1/2 lg:px-5 sm:px-5 space-y-6">
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <Input
                                    id="name"
                                    v-model="form.name"
                                    @blur="validateField('name')"
                                    :error="!!errors.name"
                                    placeholder="John Doe"
                                />
                                <InputError v-if="errors.name" :message="errors.name" />
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <Input
                                    id="email"
                                    type="email"
                                    v-model="form.email"
                                    @blur="validateField('email')"
                                    :error="!!errors.email"
                                    placeholder="john@example.com"
                                />
                                <InputError v-if="errors.email" :message="errors.email" />
                            </div>
                        </div>

                        <!-- Phone Field -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">
                                Phone Number
                            </label>
                            <div class="mt-1">
                                <Input
                                    id="phone"
                                    type="tel"
                                    v-model="form.phone"
                                    @blur="validateField('phone')"
                                    :error="!!errors.phone"
                                    placeholder="+1 (555) 123-4567"
                                />
                                <InputError v-if="errors.phone" :message="errors.phone" />
                            </div>
                        </div>

                        <!-- Category Field -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">
                                Category <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <select
                                    id="category"
                                    v-model="form.category"
                                    @blur="validateField('category')"
                                    :class="[
                                        'mt-1 block w-full pl-3 pr-10 py-2 text-base border focus:outline-none focus:ring-2 focus:border-transparent sm:text-sm rounded-md',
                                        errors.category ? 'border-red-500 focus:ring-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500'
                                    ]"
                                >
                                    <option value="">Select Category</option>
                                    <option value="Work">Work</option>
                                    <option value="Friends">Friends</option>
                                    <option value="Others">Others</option>
                                </select>
                                <InputError v-if="errors.category" :message="errors.category" />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <Button
                                type="submit"
                                class="w-full justify-center"
                                :disabled="isSubmitting"
                                :isLoading="isSubmitting"
                                variant="primary"
                            >
                                Save Contact
                            </Button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import InputError from '@/components/InputError.vue';
import { router, useForm } from '@inertiajs/vue3';

const breadcrumbs = ref([
    { title: 'Home', href: '/' },
    { title: 'Persons', href: '/persons.index' },
    { title: 'Add New Person', href: '/contacts/create' }
]);

const form = useForm({
    name: '',
    email: '',
    phone: '',
    category: 'Work',
});

const errors = ref({
    name: '',
    email: '',
    phone: '',
    category: ''
});

const isSubmitting = ref(false);

const validateField = (field: string) => {
    switch (field) {
        case 'name':
            errors.value.name = form.name.trim() === '' ? 'Name is required' : '';
            break;
        case 'email':
            if (form.email.trim() === '') {
                errors.value.email = 'Email is required';
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) {
                errors.value.email = 'Please enter a valid email address';
            } else {
                errors.value.email = '';
            }
            break;
        case 'phone':
            if (form.phone && !/^[\d\s\-()+]*$/.test(form.phone)) {
                errors.value.phone = 'Please enter a valid phone number';
            } else {
                errors.value.phone = '';
            }
            break;
        case 'category':
            errors.value.category = form.category === '' ? 'Category is required' : '';
            break;
    }
};

const validateForm = () => {
    validateField('name');
    validateField('email');
    validateField('category');
    return !Object.values(errors.value).some(error => error !== '');
};

const handleSubmit = async () => {
    if (!validateForm()) return;

    isSubmitting.value = true;

    try {
        form.post(route('persons.store'), {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                alert('Contact saved successfully!');
            },
            onError: () => {
                // Inertia will populate form.errors automatically
            },
            onFinish: () => {
                isSubmitting.value = false;
            }
        });
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    } finally {
        isSubmitting.value = false;
    }
};

const handleCancel = () => {
    form.reset();
    errors.value = { name: '', email: '', phone: '', category: '' };
    router.push({ name: 'PersonsIndex' });
};
</script>

<style scoped>
/* Prevent full page scroll */
html, body {
    height: 100%;
    overflow: hidden;
}

.min-h-screen {
    height: 100vh;
    overflow: hidden;
}
</style>
