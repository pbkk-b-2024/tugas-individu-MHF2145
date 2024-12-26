<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import axios from 'axios';

// Reactive data properties
const name = ref('');
const rows = ref(1);
const columns = ref(1);
const pokemons = ref([]);
const loading = ref(false);

// Fetch Pokémon data
const fetchPokemons = async () => {
    loading.value = true;
    pokemons.value = []; // Reset the pokemons array
    const totalPokemons = rows.value * columns.value;
    const promises = [];
    for (let i = 1; i <= totalPokemons; i++) {
        promises.push(axios.get(`https://pokeapi.co/api/v2/pokemon/${i}`));
    }
    try {
        const responses = await Promise.all(promises);
        pokemons.value = responses.map(response => ({
            name: response.data.name,
            image: response.data.sprites.front_default
        }));
    } catch (error) {
        console.error("Failed to fetch Pokémon data", error);
        alert("An error occurred while fetching Pokémon data.");
    } finally {
        loading.value = false;
    }
};
</script>

<template>
    <Head title="Implemen Page" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Implemen Page
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Name Form -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Enter your name:</label>
                            <input
                                id="name"
                                v-model="name"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>

                        <!-- Greeting message -->
                        <div v-if="name" class="mb-4 text-xl text-blue-700">
                            Hello, {{ name }}!
                        </div>

                        <!-- Grid Configuration Form -->
                        <div class="mb-4">
                            <label for="rows" class="block text-gray-700">Number of rows:</label>
                            <input
                                id="rows"
                                type="number"
                                v-model.number="rows"
                                min="1"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                            <label for="columns" class="block text-gray-700 mt-2">Number of columns:</label>
                            <input
                                id="columns"
                                type="number"
                                v-model.number="columns"
                                min="1"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                            <button
                                @click="fetchPokemons"
                                class="mt-2 px-4 py-2 bg-indigo-500 text-white rounded-md"
                            >
                                Load Pokémon
                            </button>
                        </div>

                        <!-- Loading State -->
                        <div v-if="loading" class="text-center text-blue-600">
                            Loading Pokémon...
                        </div>

                        <!-- Pokémon grid -->
                        <div :style="`grid-template-columns: repeat(${columns}, minmax(0, 1fr));`" class="grid gap-4">
                            <div v-for="pokemon in pokemons" :key="pokemon.name" class="bg-white p-1 rounded-lg shadow-md card">
                                <img :src="pokemon.image" :alt="pokemon.name" class="w-full h-12 object-cover mb-1" />
                                <div class="text-center text-gray-700 text-xs">{{ pokemon.name }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.container {
    max-width: 800px;
}

.card {
    width: 80px;
    height: 100px;
    padding: 4px;
}

img {
    height: 48px;
}

.text-xs {
    font-size: 0.75rem;
    color: black;
}

/* New styles for the form elements */
label {
    color: rgb(255, 255, 255); /* Set label text color to black */
}

input {
    color: black; /* Set input text color to black */
}

input::placeholder {
    color: black; /* Set placeholder text color to black */
}

</style>
