<script setup>
import { ref, onMounted, reactive, watch } from 'vue';
import { jobPosting } from '@/stores/JobPosting.js';
import useImageUpload from '@/composables/useUploadImage';

const props = defineProps({
    project: Object
});

const { timeJob, registerProject, updateProject } = jobPosting();
const { onFileChange, image, imageUrl } = useImageUpload();
const errores = ref({});
const time = reactive({});

const job = reactive({
    'name': props.project ? props.project.name : '',
    'time_id': props.project ? props.project.time_id : '',
    'empresa': props.project ? props.project.empresa : '',
    'description': props.project ? props.project.description : '',
    'honorarios': props.project ? props.project.honorarios : '',
    'image': props.project ? props.project.image : null,
});

console.log(job);

const handleSubmit = () => {
    const data = {
        'id': props.project ? props.project.id : '',
        'name': job.name,
        'time_id': job.time_id,
        'empresa': job.empresa,
        'description': job.description,
        'honorarios': job.honorarios,
        'image': image.value
    }

    if (props.project) {
        // console.log(data);
        updateProject(data, errores);
    } else {
        registerProject(data, errores);
    }
}
const typeTime = () => {
    timeJob(time)
}

onMounted(() => {
    typeTime();
});

watch(imageUrl, (newValue, oldValue) => {
    imageUrl.value = newValue
});

</script>

<template>
    <FormKit type="form" :actions="false" @submit="handleSubmit()">
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
                <h1 class="text-title font-popins font-bold">Empresa</h1>
                <span class="text-gray-500 text-sm font-popins">Seleccione el nombre de tu empres, en caso de ser
                    independiente, deje el campo vacío.</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="text" name="empresa" placeholder="Ej: Uber" v-model="job.empresa" />
            </div>
        </fieldset>

        <!-- Campo 4 -->
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

        <!-- Campo 5 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Honorarios</h1>
                <span class="text-gray-500 text-sm font-popins w-full block">Coloca la cantidad máxima que pagarías por
                    este proyecto. La cantidad se tomará en dólares.</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="number" name="honorarios" placeholder="Ej: Desarrollo Web" min="200" max="10000"
                    v-model="job.honorarios" />
            </div>
        </fieldset>

        <!-- Campo 6 -->
        <fieldset class="flex flex-col md:flex-row items-start justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Icono de la empresa</h1>
                <span class="text-gray-500 text-sm font-popins w-full block">Mejora la visibilidad de tu proyecto!
                    Agrega el icono de tu empresa aquí."
                </span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="file" name="image" accept="image/*" @change="onFileChange" />

                <img :src="imageUrl ? imageUrl : job.image" class="w-8/12" />

            </div>
        </fieldset>

        <input type="submit"
            class="py-2 mt-10 px-6 cursor-pointer bg-header rounded-md text-white font-popins uppercase col-span-2 w-full md:w-[250px]"
            :value="props.project ? 'Actualizar proyecto' : 'Publicar proyecto'">
    </FormKit>
</template>