<script setup>
import JobPosting from '@/components/Forms/JobPosting.vue';
import { defineProps } from 'vue';

// get data of project to edit from localstorage with name project
const editProyec = localStorage.getItem('dataProject');
const project = JSON.parse(editProyec);
</script>

<template>
    <h1 class="font-popins font-bold text-3xl text-title capitalize px-10 py-10">Verifica cada campo al momento de
        editar</h1>

    <main class="px-16 py-12 mb-10 bg-white max-w-7xl sm:mx-5 lg:mx-auto">
        <JobPosting :project="project" />
    </main>
</template>