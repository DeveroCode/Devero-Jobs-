<script setup>
import { ref, onMounted } from 'vue';
import { jobPosting } from '@/stores/JobPosting';
// Components and views
import CardProject from '@/components/Projects/CardProject.vue'
import CardFullProject from '@/components/Projects/CardFullProject.vue'

const { projects } = jobPosting();
const UseProjects = ref({});
const selectProject = ref({});

defineProps({
    users: Object
});

const getProjects = () => {
    projects(UseProjects);
}

onMounted(() => {
    getProjects();
});

const handleSelectProject = (project) => {
    // Limpiar el proyecto seleccionado anteriormente
    selectProject.value = {};
    // Asignar el nuevo proyecto seleccionado
    selectProject.value = project;
}
</script>

<template>
    <section class="max-w-7xl mx-auto grid grid-cols-2">
        <div class="col-span-1" :class="{ 'col-span-1': selectProject.id, 'col-span-2': !selectProject.id }">
            <CardProject :UseProjects="UseProjects" :handleSelectProject="handleSelectProject" />
        </div>

        <main class="px-5 col-span-1" :class="{ 'block': selectProject.id, 'hidden': !selectProject.id }">
            <CardFullProject :selectProject="selectProject" :users="users" />
        </main>


    </section>
</template>