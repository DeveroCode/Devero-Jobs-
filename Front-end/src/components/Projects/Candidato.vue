<script setup>
import Dialog from 'primevue/dialog';
import useImageUpload from '@/composables/useUploadImage';
import { ref } from 'vue';
import { jobPosting } from '@/stores/JobPosting.js';

const { createCandidate } = jobPosting();
const { onFileChange, image } = useImageUpload();

const cv = ref('');
const id = ref('');
const idUser = ref('');
const errores = ref({});

const props = defineProps({
    position: Boolean,
    openPosition: Function,
    selectProject: Object,
    users: Object
});

const handleSubmitCv = () => {
    id.value = props.selectProject.id
    idUser.value = props.users.id
    const data = {
        'cv': image.value,
        'job_posting_id': id.value,
        'user_id': idUser.value
    }
    createCandidate(data, errores);
    props.openPosition()
}
</script>

<template>
    <div>
        <div class="fixed inset-0 bg-black opacity-50 z-50" v-show="props.position"></div>

        <Dialog :visible="props.position" close-icon="false" :style="{ width: '25rem' }">
            <div class="rounded-md bg-white p-5 mb-5">
                <h1 class="text-white font-popins font-bold text-center capitalize">Envía tu C.V y postúlate a la
                    vacante</h1>

                <FormKit type="form" :actions="false">
                    <div class="py-10 px-10">
                        <FormKit type="file" name="image" label="Hoja de vida" accept=".pdf" @change="onFileChange" />
                    </div>
                </FormKit>


                <div class="flex justify-between">
                    <button @click="props.openPosition"
                        class="bg-title text-white px-5 shadow-md py-2 rounded-md font-popins">Cancelar</button>
                    <button
                        class="bg-white border border-gray-200 shadow-md text-header px-5 py-2 rounded-md font-popins"
                        @click="handleSubmitCv()">Enviar</button>
                </div>
            </div>
        </Dialog>
    </div>
</template>