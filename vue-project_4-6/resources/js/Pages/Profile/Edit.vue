<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const uploadedPhoto = ref(null);

// Load the uploaded photo from local storage when the component mounts
onMounted(() => {
    const savedPhoto = localStorage.getItem('uploadedPhoto');
    if (savedPhoto) {
        uploadedPhoto.value = savedPhoto;
    }
});
</script>

<template>

    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Profile
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <!-- Display Uploaded Photo in a Card -->
                <div v-if="uploadedPhoto" class="mt-4">
                    <div class="text-lg">
                        {{ $page.props.auth.user.name }}
                        <br><br>
                    </div>
                    <div class="card">
                        <img :src="uploadedPhoto" alt="Uploaded photo" class="object-cover w-full h-full" />
                    </div>
                </div>

                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                    <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status"
                        class="max-w-xl" />
                </div>

                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.card {
    width: 80px;
    /* Lebar kartu */
    height: 100px;
    /* Tinggi kartu */
    padding: 4px;
    /* Padding di dalam kartu */
    background-color: white;
    /* Warna latar belakang kartu */
    border: 1px solid #e5e7eb;
    /* Batas abu-abu muda */
    border-radius: 4px;
    /* Sudut membulat */
    display: flex;
    /* Mengaktifkan flexbox untuk penempatan */
    justify-content: center;
    /* Pusatkan gambar secara horizontal */
    align-items: center;
    /* Pusatkan gambar secara vertikal */
    overflow: hidden;
    /* Pastikan gambar tidak meluap */
}

.card img {
    width: 100%;
    /* Gambar mengambil lebar penuh kartu */
    height: 100%;
    /* Gambar mengambil tinggi penuh kartu */
    object-fit: cover;
    /* Skala gambar sambil mempertahankan rasio aspek */
}
.text-lg {
    font-size: 1.125rem; /* Large font size */
    font-weight: 700; /* Bold font weight */
    color: wheat; /* Black text color */
}
</style>
