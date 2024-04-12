<script setup>
import { ref, onMounted, reactive } from 'vue';
import { jobPosting } from '@/stores/JobPosting.js';

const { timeJob, registerProject } = jobPosting();
const errores = ref({});
const time = reactive({});


const job = reactive({
    'name': '',
    'time_id': '',
    'description': '',
    'honorarios': '',
    // 'image': ''
});

const handleSubmit = () => {
    const data = {
        'name': job.name,
        'time_id': job.time_id,
        'description': job.description,
        'honorarios': job.honorarios,
        // 'image': job.image
    }

    registerProject(data, errores);
}

const typeTime = () => {
    timeJob(time)
}

onMounted(() => {
    typeTime();
});

</script>

<template>
    <FormKit type="form" :actions="false" @submit="handleSubmit">
        <!-- Campo 1 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Nombre del proyecto</h1>
                <span class="text-gray-500 text-sm font-popins">El nombre del proyecto debe ser claro y conciso, además
                    de ser descriptivo</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="text" name="name" placeholder="Ej: Desarrollo Web" v-model="job.name" />
            </div>
        </fieldset>

        <!-- Campo 2 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Descripción</h1>
                <span class="text-gray-500 text-sm font-popins">Coloca una breve descripción sobre el proyecto a
                    realizar.</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="textarea" name="edescription" placeholder="Ej: Desarrollo Web"
                    v-model="job.description" />
            </div>
        </fieldset>

        <!-- Campo 3 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Tiempo</h1>
                <span class="text-gray-500 text-sm font-popins">Seleccione la modalidad o la duración deseada para la
                    realización del proyecto.</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="select" name="time" class="col-span-1 md:col-span-2" v-model="job.time_id">
                    <option disabled value="" class="capitalize">Selecciona</option>
                    <option v-for="job in time.value" :value="job.id" :key="job.id">
                        {{ job.name }}
                    </option>
                </FormKit>
            </div>
        </fieldset>

        <!-- Campo 4 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Honorarios</h1>
                <span class="text-gray-500 text-sm font-popins w-full block">Coloca la cantidad máxima que pagarías por
                    este proyecto. La cantidad se tomará en dólares.</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="number" name="name" placeholder="Ej: Desarrollo Web" min="200" max="10000"
                    v-model="job.honorarios" />
            </div>
        </fieldset>

        <!-- Campo 5 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Imagen</h1>
                <span class="text-gray-500 text-sm font-popins w-full block">Una imagen con los requisitos que
                    necesitas, ayudaría al postulante</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="file" name="image" accept=".pgn, .jpg, .png, .jpeg, .webp" v-model="job.image" />
            </div>
        </fieldset>

        <input type="submit"
            class="py-2 mt-10 px-6 cursor-pointer bg-header rounded-md text-white font-popins uppercase col-span-2 w-full md:w-[150px]"
            value="Publicar">
    </FormKit>
</template>