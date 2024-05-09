<script setup>
const props = defineProps({
    selectProject: Object,
    users: Object,
    openPosition: Function,
    position: Boolean
});
</script>

<template>
    <div>

        <div class="fixed inset-0 bg-black opacity-50 z-50" v-show="props.position"></div>

        <Dialog :visible="props.position" close-icon="false" :style="{ width: '25rem' }">
            <div class="rounded-md bg-white p-5 mb-5">
                <section class="bg-white rounded-md px-6 py-10">
                    <div class="flex justify-between mb-10 gap-3">
                        <img :src="selectProject.image" alt="Image for project" class="w-32">
                        <div>
                            <h2 class="font-poppins font-bold font-title text-xl">{{ selectProject.name }}</h2>
                            <span class="block text-title font-poppins text-lg">{{ selectProject.empresa }}</span>
                        </div>
                    </div>

                    <div class="py-2">
                        <p class="font-poppins font-bold">Proyecto a realizar</p>
                        <span class="font-poppins">
                            {{ selectProject.description }}
                        </span>
                    </div>

                    <div class="py-5">
                        <span class="font-poppins font-bold text-sm">Skills y Experiencia</span>
                        <div class="flex gap-3 mt-2">
                            <button
                                class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">Kotlin</button>
                            <button
                                class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">HTML5</button>
                            <button
                                class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">Flutter</button>
                        </div>
                    </div>
                </section>


                <div class="flex justify-between">
                    <button @click="props.openPosition()"
                        class="bg-title text-white px-5 shadow-md py-2 rounded-md font-popins">Cancelar</button>
                    <button
                        class="bg-white border border-gray-200 shadow-md text-header px-5 py-2 rounded-md font-popins">Enviar</button>
                </div>
            </div>
        </Dialog>
    </div>
</template>