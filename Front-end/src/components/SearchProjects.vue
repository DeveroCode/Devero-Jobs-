<script setup>
import { Bars4Icon } from '@heroicons/vue/24/outline';
import { defineProps } from 'vue';

const props = defineProps({
    toggleMenu: Function
});
</script>

<template>
    <header class="w-full bg-white border-b-2 border-gray-300 py-4 shadow-sm">
        <div className="flex flex-col sm:flex-row items-center justify-center">
            <button @click="toggleMenu">
                <Bars4Icon class="w-7 block xl:hidden" />
            </button>
            <input type="text"
                className="w-4/12 md:w-1/2 rounded-l-md py-3 px-4 border border-none focus:outline-none bg-secondary mb-3 sm:mb-0"
                placeholder="Ej: Diseño web para paquime" />
            <button className="bg-title text-white font-bold py-3 px-4 rounded-r-md">
                Buscar
            </button>
        </div>
    </header>
</template>