<template>
  <div class="max-w-7xl mx-auto p-5">
    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Attraction Catalog</h1>

    <div class="mb-10 max-w-2xl mx-auto">
      <input 
        v-model="searchTerm" 
        type="text" 
        placeholder="Search by name, description, coordinate, or category..." 
        class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
      >
      <p v-if="searchTerm" class="mt-2 text-sm text-gray-500">
        Showing {{ filteredAttractions.length }} results for "{{ searchTerm }}"
      </p>
    </div>

    <div v-if="loading" class="text-center p-10 bg-blue-50 border border-blue-200 rounded-lg text-blue-700">
      Loading attractions...
    </div>
    
    <div v-else-if="error" class="text-center p-10 bg-red-50 border border-red-200 rounded-lg text-red-700">
      {{ error }}
    </div>

    <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <AttractionCard 
        v-for="attraction in filteredAttractions" 
        :key="attraction.id" 
        :attraction="attraction"
      />
    </div>

    <div v-if="!loading && filteredAttractions.length === 0" class="text-center py-20 text-gray-500">
      No attractions found matching your search.
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';

const attractions = ref([]);
const searchTerm = ref('');
const loading = ref(true);
const error = ref(null);

/**
 * Filter Logic:
 * Computed property that updates whenever searchTerm or attractions change.
 */
const filteredAttractions = computed(() => {
  if (!searchTerm.value.trim()) {
    return attractions.value;
  }

  const query = searchTerm.value.toLowerCase();

  return attractions.value.filter(item => {
    return (
      item.name?.toLowerCase().includes(query) ||
      item.description?.toLowerCase().includes(query) ||
      item.coordinate?.toLowerCase().includes(query) ||
      item.category?.name?.toLowerCase().includes(query)
    );
  });
});

const fetchAttractions = async () => {
  loading.value = true;
  error.value = null;
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/attractions');
    
    if (response.data && response.data.message === "Attractions retrieved successfully") {
      attractions.value = response.data.data;
    } else {
      throw new Error("Invalid API response structure.");
    }
  } catch (e) {
    console.error("Error fetching attractions:", e);
    error.value = "Unable to load attractions. Please ensure the backend server is running.";
  } finally {
    loading.value = false;
  }
};

onMounted(() => {
  fetchAttractions();
});
</script>