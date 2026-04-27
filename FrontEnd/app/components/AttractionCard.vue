<template>
  <div class="group bg-white border border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-200">
    <div class="relative overflow-hidden h-48">
      <img 
        :src="attraction.img_path || '/placeholder.png'" 
        :alt="`${attraction.name} image`" 
        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
      >
      <div class="absolute top-3 left-3">
        <span class="px-2 py-1 text-xs font-semibold bg-white/90 backdrop-blur-sm text-blue-600 rounded-md shadow-sm">
          {{ attraction.category?.name || 'General' }}
        </span>
      </div>
    </div>

    <div class="p-5">
      <h2 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
        {{ attraction.name }}
      </h2>
      <p class="text-gray-600 text-sm line-clamp-3 mb-4">
        {{ attraction.description }}
      </p>
      
      <div class="space-y-1 text-sm text-gray-700 border-t pt-4">
        <div class="flex items-center">
          <span class="mr-2 text-blue-500">📍</span> 
          <span class="truncate">{{ attraction.coordinate }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
// Define the props that this component expects
defineProps({
  attraction: {
    type: Object,
    required: true
  }
});
</script>