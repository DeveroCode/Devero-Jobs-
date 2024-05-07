<script setup>
import { defineProps } from 'vue';

defineProps({
    selectProject: Object
});

</script>

<template>
    <section class="bg-white rounded-md px-6 py-10">
        <div class="flex justify-between mb-10 gap-3">
            <img :src="selectProject.image" alt="Image for project" class="w-32">
            <div>
                <h2 class="font-poppins font-bold font-title text-xl">{{ selectProject.name }}</h2>
                <span class="block text-title font-poppins text-lg">{{ selectProject.empresa }}</span>
            </div>

            <div>
                <button
                    class="bg-header text-white rounded-md px-5 py-2 font-popins text-sm uppercase">postularme</button>
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
                <button class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">Kotlin</button>
                <button class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">HTML5</button>
                <button class="bg-gray-400 text-white rounded-md py-1 px-5 font-popins text-sm">Flutter</button>
            </div>
        </div>
    </section>
</template>