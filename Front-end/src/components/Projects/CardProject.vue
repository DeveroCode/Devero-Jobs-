<script setup>
import { defineProps } from 'vue';
import Candidato from '@/components/Candidates/Candidato.vue';

const prop = defineProps({
    UseProjects: Array,
    handleSelectProject: Function,
    selectProject: Object,
    position: Boolean,
    openPosition: Function,
    users: Object
});


const handleSubmitCPro = project => {
    prop.openPosition();
    prop.handleSelectProject(project);
}
</script>

<template>
    <div v-for="project in UseProjects" :key="project.id" class="bg-white py-10 mb-10 px-10 rounded-md">
        <section class="flex flex-col md:flex-row gap-4 items-start md:items-center">
            <img :src="project.image" alt="" class="w-full md:w-32" />
            <button class="font-poppins font-semibold font-title text-xl text-left md:text-2xl"
                @click="handleSelectProject(project)">
                {{ project.name }}</button>
        </section>

        <main class="py-10 block md:hidden">
            <h2 class="font-poppins text-title text-xl"> {{ project.description }}</h2>
        </main>

        <button
            class="font-poppins w-full md:hidden font-semibold text-lg uppercase bg-title rounded-md shadow-md py-1 px-4 text-white"
            @click="handleSubmitCPro(project)">
            postularme
        </button>

        <div>
            <h2 class="mt-10 font-poppins text-title text-xl uppercase">conocimientos necesarios
                (Obligatorio)</h2>
            <section class="flex gap-3 my-5">
                <button class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">MongoDB</button>
                <button class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">React</button>
                <button class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">Laravel</button>
            </section>
        </div>

        <Candidato :position="position" :openPosition="openPosition" :selectProject="selectProject" :users="users" />
    </div>
</template>