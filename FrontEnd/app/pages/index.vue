<template>
  <div class="min-h-screen bg-gray-50">
    <header class="bg-white shadow-sm">
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
          Discover Amazing Places
        </h1>
        <p class="mt-5 max-w-xl mx-auto text-xl text-gray-500">
          Explore the best attractions and hidden gems in our catalog.
        </p>
        <div class="mt-8">
          <router-link 
            to="/search" 
            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition-colors"
          >
            🔍 Browse All Attractions
          </router-link>
        </div>
      </div>
    </header>

    <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-end mb-8">
        <div>
          <h2 class="text-2xl font-bold text-gray-900">Featured Attractions</h2>
          <p class="text-gray-600">Handpicked spots just for you.</p>
        </div>
        <router-link to="/search" class="text-blue-600 hover:text-blue-800 font-medium text-sm">
          View all &rarr;
        </router-link>
      </div>

      <div v-if="loading" class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div v-for="i in 3" :key="i" class="h-64 bg-gray-200 animate-pulse rounded-xl"/>
      </div>

      <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <AttractionCard 
          v-for="attraction in featuredAttractions" 
          :key="attraction.id" 
          :attraction="attraction"
        />
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';

const attractions = ref([]);
const loading = ref(true);

// Get only the first 3 attractions for the homepage display
const featuredAttractions = computed(() => {
  return attractions.value.slice(0, 3);
});

const fetchFeatured = async () => {
  loading.value = true;
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/attractions');
    if (response.data && response.data.data) {
      attractions.value = response.data.data;
    }
  } catch (e) {
    console.error("Failed to load featured items", e);
  } finally {
    loading.value = false;
  }
};

onMounted(() => {
  fetchFeatured();
});
</script>