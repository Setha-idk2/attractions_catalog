<template>
  <div class="max-w-screen mx-auto p-5">
    <h1 class="text-5xl font-bold mb-15 text-blue-500 underline drop-shadow-lg">Attraction Detail</h1>
    
    <div v-if="loading" class="text-center py-8 bg-blue-50 border border-blue-200 rounded-lg text-blue-700">
      Loading attraction details...
    </div>
    
    <div v-else-if="error" class="text-center p-10 bg-red-50 border border-red-200 rounded-lg text-red-700">
      {{ error }}
    </div>
    
    <div v-else class="max-w-screen mx-auto p-5 flex flex-row gap-5">
      <img :src="attraction.img_url" alt="Attraction image" class="w-[30%] rounded-lg shadow-md mb-10">
      <div class="flex flex-col gap-5 mt-10">
        <h2 class="text-xl font-semibold mb-2">{{ attraction.name }}</h2>
        <p class="text-gray-700 text-lg">{{ attraction.description }}</p>
        <p class="mt-4 text-sm text-gray-500">Coordinate: {{ attraction.coordinate }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const route = useRoute();
const attractionId = route.params.id;
const loading = ref(true);
const error = ref(null);
const attraction = ref();

const fetchAttraction = async () => {
  try {
    loading.value = true;
    error.value = null;
    const response = await axios.get(`http://localhost:8000/api/attractions/${attractionId}`);
    console.log("response", response);
    if (response.status === 200) {
      attraction.value = response.data.data;
    } else {
      throw new Error("Invalid API response structure.");
    }
  } catch (e) {
    console.error("Error fetching attraction:", e);
    error.value = "Unable to load attraction details. Please ensure the backend server is running.";
  } finally {
    loading.value = false;
  }
};

onMounted(() => {
  fetchAttraction();
});
</script>