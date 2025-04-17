<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md mx-auto">
                <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-extrabold text-gray-900">Add New Contact</h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Fill in the details below to add a new contact
                        </p>
                    </div>

                    <form @submit.prevent="handleSubmit" class="space-y-6">
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
                    errors.category
                      ? 'border-red-500 focus:ring-red-500'
                      : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500'
                  ]"
                                >
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
                            <Button
                                type="button"
                                class="flex-1 justify-center"
                                variant="secondary"
                                @click="handleCancel"
                            >
                                Cancel
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

const breadcrumbs = ref([
    { title: 'Home', href: '/' },
    { title: 'Persons', href: '/persons.index' },
    { title: 'Add New Person', href: '/contacts/create' }
])
const form = ref({
    name: '',
    email: '',
    phone: '',
    category: 'Work'
});

const errors = ref({
    name: '',
    email: '',
    phone: '',
    category: ''
});

const isSubmitting = ref(false);

const validateField = (field) => {
    switch (field) {
        case 'name':
            errors.value.name = form.value.name.trim() === '' ? 'Name is required' : '';
            break;
        case 'email':
            if (form.value.email.trim() === '') {
                errors.value.email = 'Email is required';
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.value.email)) {
                errors.value.email = 'Please enter a valid email address';
            } else {
                errors.value.email = '';
            }
            break;
        case 'phone':
            if (form.value.phone && !/^[\d\s\-()+]*$/.test(form.value.phone)) {
                errors.value.phone = 'Please enter a valid phone number';
            } else {
                errors.value.phone = '';
            }
            break;
        case 'category':
            errors.value.category = form.value.category === '' ? 'Category is required' : '';
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
    if (!validateForm()) {
        return;
    }

    isSubmitting.value = true;

    try {
        console.log('Form submitted:', form.value);
        await new Promise(resolve => setTimeout(resolve, 1000));

        // Reset form
        form.value = { name: '', email: '', phone: '', category: 'Work' };
        errors.value = { name: '', email: '', phone: '', category: '' };

        // Show success (in a real app, use a toast notification)
        alert('Contact saved successfully!');
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    } finally {
        isSubmitting.value = false;
    }
};
const handleCancel = () => {
    // Optionally reset form fields and errors
    form.value = { name: '', email: '', phone: '', category: 'Work' };
    errors.value = { name: '', email: '', phone: '', category: '' };
    // Navigate back to the contacts list without reloading data
    router.push({ name: 'PersonsIndex' });
};
</script>
