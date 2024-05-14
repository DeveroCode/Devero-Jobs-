<script setup>
import { PencilSquareIcon, EyeIcon, ArchiveBoxXMarkIcon } from '@heroicons/vue/24/outline';
import { defineProps, ref, emit } from 'vue';
import { jobPosting } from '@/stores/JobPosting'
import router from '@/router';

const { getProject, candidates } = jobPosting();
const dataProject = ref(null);

defineProps({
    project: Object
})

const handleGetProject = async (id) => {
    const response = await getProject(id);
    dataProject.value = response;
    console.log(dataProject.value);
    //  save dataProject in localstorage
    localStorage.setItem('dataProject', JSON.stringify(dataProject.value));
    router.push({ name: 'editar', params: { id: dataProject.value.id } });
};


const handleGetCandidates = async (id) => {
    const { data } = await candidates(id);
    dataProject.value = data;
    emit('candidates', dataProject.value);
    router.push({ name: 'postulantes', params: { id: id } });
}
</script>

<template>
    <div
        class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <h4 class="mb-6 text-xl font-semibold text-black capitalize">
            proyectos en desarrollo</h4>

        <table class="flex flex-col">
            <tr class="grid grid-cols-3 rounded-sm bg-main sm:grid-cols-3">
                <th class="p-2 xl:p-5">
                    <h5 class="text-sm font-medium uppercase xs:text-base">Proyecto</h5>
                </th>
                <th class="p-2  xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Descripcion</h5>
                </th>
                <th class="p-2  xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Herramientas</h5>
                </th>
            </tr>
            <tr v-for="(job, index) in  project " :key="index" class="grid grid-cols-3 sm:grid-cols-3">
                <td class="flex items-center gap-3 p-2 xl:p-5">
                    <p class="text-black">{{ job.name }}</p>
                </td>
                <td class="p-2 xl:p-5">
                    <p class="text-meta-3 ">{{ job.description }}</p>
                </td>
                <td class="p-2 xl:p-5 mx-auto">
                    <div class="flex gap-5">
                        <button @click="handleGetProject(job.id)">
                            <PencilSquareIcon class="w-7 text-title" />
                        </button>
                        <button @click="handleGetCandidates(job.id)">
                            <EyeIcon class="w-7 text-title" />
                        </button>
                        <button>
                            <ArchiveBoxXMarkIcon class="w-7 text-title" />
                        </button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</template>