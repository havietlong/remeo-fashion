<template>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li v-for="(breadcrumb, index) in breadcrumbs" :key="index" class="breadcrumb-item">
          <router-link :to="breadcrumb.url">{{ breadcrumb.name }}</router-link>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ currentRoute }}</li>
      </ol>
    </nav>
  </template>
  
  <script>
  export default {
    computed: {
      breadcrumbs() {
        const route = this.$route;
        const matchedRoutes = route.matched;
  
        return matchedRoutes.map((route) => ({
          name: route.name,
          url: route.path,
        }));
      },
      currentRoute() {
        return this.$route.name;
      },
    },
  };
  </script>
  
  <style scoped>
  /* Your breadcrumb component styles */
  </style>
  