<script setup>
import CardProject from '@/components/Projects/CardProject.vue'
import CardFullProject from '@/components/Projects/CardFullProject.vue'
</script>

<template>
    <section class="max-w-7xl mx-auto px-10 grid grid-cols-2">
        <div class="col-span-1">
            <CardProject />
        </div>

        <main class="px-5 col-span-1">
            <CardFullProject />
        </main>
    </section>
</template>