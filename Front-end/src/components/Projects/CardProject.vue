<script setup>
import { defineProps } from 'vue';

defineProps({
    UseProjects: Array,
    handleSelectProject: Function
});
</script>

<template>
    <div v-for="project in UseProjects" :key="project.id" class="bg-white py-10 mb-10 px-10 rounded-md">
        <section class="flex gap-4 items-center">
            <img :src="project.image" alt="" class="w-16" />
            <button class="font-poppins font-bold font-title text-xl" @click="handleSelectProject(project)">{{
        project.name }}</button>
        </section>
        <section class="flex gap-3 my-5">
            <button class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">Ui Design</button>
            <button class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">Ui Design</button>
            <button class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">Ui Design</button>
        </section>
    </div>
</template>