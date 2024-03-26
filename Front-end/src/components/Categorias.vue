<script setup>
import { Categorias } from '../data/Categorias.js'
</script>

<template>
    <div class="flex flex-col md:flex-row gap-10 items-center justify-between mt-10">
        <div v-for="categoria in Categorias" :key="categoria.id"
            class="rounded-md bg-main py-3 px-5 hover:bg-header hover:text-white transition-colors duration-300 w-[300px]">
            <p class="font-bold font-popins text-center text-2xl py-2 px-3">{{ categoria.nombre }}</p>
            <span class="block text-center font-popins">{{ categoria.cantidad }}</span>
        </div>
    </div>
</template>