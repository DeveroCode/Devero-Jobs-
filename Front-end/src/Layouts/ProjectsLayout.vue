<script setup>
import { ref, onMounted } from 'vue';
import { jobPosting } from '@/stores/JobPosting';
// Components and views
import CardProject from '@/components/Projects/CardProject.vue'
import CardFullProject from '@/components/Projects/CardFullProject.vue'

const { projects } = jobPosting();
const UseProjects = ref({}); // Get proyects from DB
const selectProject = ref({}); // Select project proyect to show
const position = ref(false); // Open position with modal

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
    selectProject.value = {};
    selectProject.value = project;
}


const openPosition = () => {
    position.value = !position.value;
};
</script>

<template>
    <section class="max-w-7xl mx-auto grid grid-cols-2">
        <div class="col-span-2 px-4" :class="{ 'md:col-span-1': selectProject.id, 'col-span-2': !selectProject.id }">
            <CardProject :UseProjects="UseProjects" :handleSelectProject="handleSelectProject"
                :selectProject="selectProject" :position="position" :openPosition="openPosition" :users="users" />
        </div>

        <main class="px-5 col-span-1 hidden" :class="{ 'md:block': selectProject.id, 'hidden': !selectProject.id }">
            <CardFullProject :openPosition="openPosition" :selectProject="selectProject" :position="position"
                :users="users" />
        </main>
    </section>
</template>