<script setup>
import { Empresas } from '../data/Empresas.js'

function getLogo() {
    const logos = []
    for (let i = 0; i < Empresas.length; i++) {
        logos.push(`/empresas/${Empresas[i].logo}.png`)
    }
    return logos;
}
</script>

<template>
    <section class="w-full justify-center gap-10 md:gap-0 items-center flex flex-row flex-wrap lg:space-x-10">
        <img v-for="(logo, index) in getLogo()" :key="index" :src="logo" class="w-32 lg:w-[10rem] mb-5" />
    </section>

</template>