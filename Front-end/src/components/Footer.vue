<script setup>
import { RouterLink } from 'vue-router';
// Images
import Logo from '/logo.png'
</script>

<template>
    <footer class="py-5 px-5 lg:px-20 grid grid-cols-12 gap-5 md:gap-10 items-center">
        <!-- Logo y descripción -->
        <section class="col-span-12 lg:col-span-6">
            <img :src="Logo" class="w-32 lg:w-40 mx-auto md:ml-[-30px]" />
            <h2 class="font-bold font-popins text-md text-center md:text-start lg:text-xl mt-3 lg:w-8/12">
                Creando experiencias digitales con elegancia y eficiencia
            </h2>
            <div class="mt-3 text-sm lg:text-base font-popins text-center md:text-start">
                <p>Contactanos</p>
                <span class="block">Devero@code.com</span>
                <span class="block">636-555-5555</span>
            </div>
        </section>

        <!-- Secciones de navegación -->
        <section class="col-span-6 lg:col-span-2 space-y-3">
            <p class="font-bold font-title text-lg lg:text-xl">Compañia</p>
            <nav class="flex flex-col font-popins space-y-3">
                <RouterLink :to="{ name: 'home' }" class="hover:text-title">Inicio</RouterLink>
                <RouterLink :to="{ name: 'home' }" class="hover:text-title">Sobre Nosotros</RouterLink>
                <RouterLink :to="{ name: 'home' }" class="hover:text-title">Foro</RouterLink>
            </nav>
        </section>

        <section class="col-span-6 lg:col-span-2 space-y-3">
            <p class="font-bold font-title text-lg lg:text-xl">Ayuda</p>
            <nav class="flex flex-col font-popins space-y-3">
                <RouterLink :to="{ name: 'home' }" class="hover:text-title">Contactanos</RouterLink>
                <RouterLink :to="{ name: 'home' }" class="hover:text-title">Preguntas</RouterLink>
                <RouterLink :to="{ name: 'home' }" class="hover:text-title">Terminos</RouterLink>
            </nav>
        </section>

        <section class="col-span-12 lg:col-span-2 space-y-3">
            <p class="font-bold font-title text-lg lg:text-xl text-center md:text-start">Devs</p>
            <nav class="flex flex-col space-y-3 text-center md:text-start">
                <RouterLink :to="{ name: 'home' }" class="font-popins hover:text-title">Ui/Ux</RouterLink>
                <RouterLink :to="{ name: 'home' }" class="font-popins hover:text-title">Desarrollador Web
                </RouterLink>
                <RouterLink :to="{ name: 'home' }" class="font-popins hover:text-title">Admin. de proyectos
                </RouterLink>
            </nav>
        </section>
    </footer>
</template>