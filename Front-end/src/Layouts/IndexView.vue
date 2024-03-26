<script setup>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
</script>

<template>
    <div class="max-w-full">
        <Header />
        <RouterView />
        <Footer />
    </div>
</template>