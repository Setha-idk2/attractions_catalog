<script setup lang="ts">
const { data: attractions, pending, error } = await useFetch('http://localhost:8000/api/attractions')
</script>

<template>
  <div>
    <h1>Attractions Catalog</h1>
    
    <div v-if="pending">
      Loading attractions...
    </div>
    
    <div v-else-if="error">
      Error loading attractions: {{ error.message }}
    </div>
    
    <div v-else>
      <ul>
        <li v-for="attraction in attractions" :key="attraction.id">
          <h2>{{ attraction.name }}</h2>
          <p>category: {{ attraction.category_id }}</p>
          <p>{{ attraction.description }}</p>
          <p><strong>Location:</strong> {{ attraction.coordinate}}</p>
        </li>
      </ul>
    </div>
  </div>
</template>
