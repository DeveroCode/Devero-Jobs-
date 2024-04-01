<script setup>
import { RouterLink } from 'vue-router'
// Icons
import { CalendarDaysIcon, EnvelopeIcon, UsersIcon, CurrencyDollarIcon } from '@heroicons/vue/24/outline';
// Components and Views
import Search from '../components/SearchProjects.vue';
import Projects from '../components/ProjectsTable.vue';
</script>

<template>
    <section>
        <!-- Card Info -->
        <section class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
                <RouterLink :to="{ name: 'home' }"
                    class="bg-white rounded-sm shadow-default py-10 px-6 border border-gray-300">
                    <div class="rounded-full h-12 w-12 bg-circle flex items-center justify-center mb-5">
                        <CalendarDaysIcon class="w-7 text-icons" />
                    </div>


                    <div>
                        <p class="text-2xl font-popins font-bold text-title">14</p>
                        <h2 class="text-header font-popins capitalize">Revisiones pendientes</h2>
                    </div>
                </RouterLink>

                <RouterLink :to="{ name: 'home' }"
                    class="bg-white rounded-sm shadow-sm border border-gray-300 py-10 px-6">
                    <div class="rounded-full h-12 w-12 bg-circle flex items-center justify-center mb-5">
                        <EnvelopeIcon class="w-7 text-icons" />
                    </div>


                    <div>
                        <p class="text-2xl font-popins font-bold text-title">346</p>
                        <h2 class="text-header font-popins capitalize">Mensajes pendientes</h2>
                    </div>
                </RouterLink>

                <RouterLink :to="{ name: 'home' }"
                    class="bg-white rounded-sm shadow-sm border border-gray-300 py-10 px-6">
                    <div class="rounded-full h-12 w-12 bg-circle flex items-center justify-center mb-5">
                        <UsersIcon class="w-7 text-icons" />
                    </div>


                    <div>
                        <p class="text-2xl font-popins font-bold text-title">16</p>
                        <h2 class="text-header font-popins capitalize">Team</h2>
                    </div>
                </RouterLink>

                <RouterLink :to="{ name: 'home' }"
                    class="bg-white rounded-sm shadow-sm border border-gray-300 py-10 px-6">
                    <div class="rounded-full h-12 w-12 bg-circle flex items-center justify-center mb-5">
                        <CurrencyDollarIcon class="w-7 text-icons" />
                    </div>


                    <div>
                        <p class="text-2xl font-popins font-bold text-title">16</p>
                        <h2 class="text-header font-popins capitalize">Patners</h2>
                    </div>
                </RouterLink>
            </div>
        </section>
        <!-- End Car Info -->

        <main class="p-4 md:p-6 2xl:p-10">
            <Projects />
        </main>
    </section>
</template>