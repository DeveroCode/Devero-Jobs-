<script setup>
import { onMounted, reactive, ref } from 'vue';
import { jobPosting } from '@/stores/JobPosting';
// Components and Views
import Tables from '@/components/ProjectsTable.vue'

const { projects } = jobPosting();
const project = ref({});

const getProject = () => {
    projects(project);
};

onMounted(() => {
    getProject();
});
</script>

<template>
    <main class="py-20 px-10 space-y-16">
        <Tables :project="project" />
    </main>
</template>