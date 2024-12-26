<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        You're logged in as {{ $page.props.auth.user.name }}!
                    </div>
                </div>

                <!-- Upload Photo Form -->
                <div class="mt-6 bg-white p-4 shadow-md dark:bg-gray-800 text-lg">
                    <input type="file" @change="handleFileChange" />
                    <button
                        @click="uploadPhoto"
                        class="mt-2 p-2 bg-blue-500 text-white rounded"
                    >
                        Upload Photo
                    </button>
                </div>

                <!-- Display Uploaded Photo in a Card -->
                <div v-if="uploadedPhoto" class="mt-4">
                    <h3 class="text-lg font-semibold">Your Photo Profile:</h3>
                    <div class="card">
                        <img :src="uploadedPhoto" alt="Uploaded photo" class="object-cover w-full h-full" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

// Assuming you receive the username from props or an API call
const props = defineProps(['username']); // Get username from props

const uploadedPhoto = ref(null);
const selectedFile = ref(null);

// Load the uploaded photo from local storage when the component mounts
onMounted(() => {
    const savedPhoto = localStorage.getItem('uploadedPhoto');
    if (savedPhoto) {
        uploadedPhoto.value = savedPhoto;
    }
});

const handleFileChange = (event) => {
    const files = event.target.files;
    if (files.length > 0) {
        selectedFile.value = files[0]; // Save the first file selected
    } else {
        selectedFile.value = null; // Reset if no file is selected
    }
};

const uploadPhoto = async () => {
    if (!selectedFile.value) {
        alert('Please select a file first!');
        return;
    }

    const formData = new FormData();
    formData.append('photo', selectedFile.value);

    try {
        const response = await axios.post('/upload-photo', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        if (response.data.path) {
            uploadedPhoto.value = response.data.path;
            // Save the photo path to local storage
            localStorage.setItem('uploadedPhoto', response.data.path);
        }
    } catch (error) {
        console.error('Error uploading photo:', error);
    }
};
</script>

<style scoped>
.card {
    width: 80px; /* Card width */
    height: 100px; /* Card height */
    padding: 4px; /* Padding inside the card */
    background-color: white; /* Card background color */
    border: 1px solid #e5e7eb; /* Light gray border */
    border-radius: 4px; /* Rounded corners */
    display: flex; /* Enable flexbox for centering */
    justify-content: center; /* Center the image horizontally */
    align-items: center; /* Center the image vertically */
    overflow: hidden; /* Ensure image doesn't overflow */
}

.card img {
    width: 100%; /* Image takes full width of the card */
    height: 100%; /* Image takes full height of the card */
    object-fit: cover; /* Scale the image while maintaining aspect ratio */
}

.text-lg {
    font-size: 1.125rem; /* Large font size */
    font-weight: 700; /* Bold font weight */
    color: wheat; /* Black text color */
}
</style>
