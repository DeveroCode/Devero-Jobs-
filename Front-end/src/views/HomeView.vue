<script setup>
import { RouterLink } from 'vue-router';
// Icons and Images
import { UserIcon, CloudArrowUpIcon, MagnifyingGlassIcon, CheckBadgeIcon } from '@heroicons/vue/24/outline'
import JobMen from '../assets/img/people-job.jpg'
// Views and Components
import People from '../assets/img/jo-people.jpg'
import Empresas from '../components/Empresas.vue'
import Categorias from '../components/Categorias.vue'
</script>

<template>
    <main class="max-w-full py-5 px-5 lg:px-20">
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center justify-center mt-10 mb-20">
            <!-- Texto -->
            <div class="lg:col-span-1">
                <div class="flex flex-col">
                    <h1 class="text-3xl lg:text-4xl font-popins font-bold mb-3">
                        <span
                            class="text-lg lg:text-2xl rounded-sm bg-header px-3 lg:px-4 py-1 mt-3 text-white inline-block transform rotate-[-2deg]">
                            Nosotros
                        </span>
                        te ayudamos a realizar proyecto ideal
                    </h1>
                </div>

                <span class="text-sm lg:text-base w-full lg:w-8/12 block py-3">
                    Explora una amplia gama de servicios ofrecidos por expertos en diversas áreas, encuentra el talento
                    que necesitas para acceder a oportunidades emocionantes en el mundo laboral
                </span>

                <div class="space-x-5 mt-6">
                    <RouterLink :to="{ name: 'login' }"
                        class="bg-title py-3 px-7 rounded-sm text-white font-popins font-bold uppercase">
                        Iniciar
                    </RouterLink>
                    <RouterLink :to="{ name: 'home' }"
                        class="border border-title px-7 py-3 uppercase font-bold font-popins">
                        Enviar C.V
                    </RouterLink>
                </div>
            </div>

            <!-- Imagen -->
            <div class="lg:col-span-1">
                <img :src="People" alt="woman in the job" class="w-full lg:w-8/12 mx-auto">
            </div>
        </section>

        <Empresas />
    </main>

    <div class="bg-white py-10 lg:py-32 px-5 lg:px-20 flex flex-col lg:flex-row justify-between items-center">
        <!-- Texto -->
        <div class="w-full py-10 md:py-0 lg:w-1/2">
            <h2 class="font-popins font-bold text-2xl lg:text-4xl mb-3 lg:w-1/2">Descubre la mejor solución entre 16M+
                de expertos!. </h2>
            <p class="text-gray-500 mt-2 mb-3 md:mb-0">Solo sigue estos cuatro pasos</p>
        </div>

        <!-- Cards -->
        <section class="w-full lg:w-1/2 grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="rounded-md border-2 border-header py-5 text-center">
                <UserIcon class="w-16 mx-auto text-title" />
                <p class="font-popins font-bold text-lg mt-3">Crea una cuenta</p>
                <span class="text-sm font-popins block px-5 text-title">Crea una cuenta para visualizar más opciones
                    personalizadas a tu gusto</span>
            </div>

            <div class="rounded-md border-2 border-header py-5 text-center lg:transform lg:translate-y-10">
                <CloudArrowUpIcon class="w-16 mx-auto text-title" />
                <p class="font-popins font-bold text-lg mt-3">Seguridad</p>
                <span class="text-sm font-popins block px-5 text-title">Almacena todo el avance de tu proyecto a través
                    de
                    nuestra nube</span>
            </div>

            <div class="rounded-md border-2 border-header py-5 text-center">
                <MagnifyingGlassIcon class="w-16 mx-auto text-title" />
                <p class="font-popins font-bold text-lg mt-3">Encuentra</p>
                <span class="text-sm font-popins block px-5 text-title">Descubre la mejor solución entre 16M+ de
                    expertos!</span>
            </div>

            <div class="rounded-md border-2 border-header py-5 text-center lg:transform lg:translate-y-10">
                <CheckBadgeIcon class="w-16 mx-auto text-title" />
                <p class="font-popins font-bold text-lg mt-3">Aplica</p>
                <span class="text-sm font-popins block px-5 text-title">Aplica a diferentes proyectos al mismo
                    tiempo</span>
            </div>
        </section>
    </div>

    <div class="bg-white py-20 px-0 md:py-32 md:px-20">
        <h4 class="font-bold font-popins text-center text-3xl capitalize">Tu plataforma para conectar con profesionistas
        </h4>
        <span class="mx-auto text-center block mt-5 text-sm text-title w-9/12">Explora una amplia gama de servicios
            ofrecidos por
            expertos en
            diversas
            áreas,
            encuentra el talento que
            necesitas para acceder a oportunidades emocionantes en el mundo laboral</span>

        <Categorias class="py-5 px-20" />
    </div>

    <section
        class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center max-w-full bg-white py-12 lg:py-64 px-5 lg:px-20">
        <!-- Contenido en la primera columna -->
        <div class="lg:col-span-1">
            <h2 class="text-xl lg:text-4xl font-bold font-title font-popins w-full lg:w-10/12 mb-5 lg:mb-10">500+
                mejores empresas locales publican sus ofertas de empleo</h2>
            <button class="rounded-sm bg-header py-2 px-6 font-popins text-white">Enviar C.V</button>
        </div>

        <!-- Imagen en la segunda columna -->
        <div class="lg:col-span-1">
            <img :src="JobMen" alt="Men in the job" class="w-full lg:w-7/12 mx-auto rounded-md">
        </div>
    </section>

</template>