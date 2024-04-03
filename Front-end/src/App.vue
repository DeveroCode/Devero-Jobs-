<script setup>
import { RouterView } from 'vue-router';
import ErrorAlert from './components/ErrorAlert.vue';
</script>

<template>
  <RouterView />
  <ErrorAlert />
</template>