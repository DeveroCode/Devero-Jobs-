<script setup>
import { RouterLink } from 'vue-router';
import { ChartBarSquareIcon, UsersIcon, FolderIcon, DevicePhoneMobileIcon, HomeIcon } from '@heroicons/vue/24/outline'
</script>

<template>
    <aside class="h-screen bg-white">
        <nav class="px-10 py-20 space-y-4">
            <RouterLink :to="{ name: 'dashboard' }"
                class="text-gray-400 text-lg hover:text-white bg-title rounded-md py-3 px-5 w-2/3 transition-colors duration-300 font-popins flex items-center gap-5">
                <ChartBarSquareIcon class="w-7" />
                Dashboard
            </RouterLink>
            <RouterLink :to="{ name: 'home' }"
                class="text-gray-400 text-lg hover:text-white transition-colors duration-300 font-popins flex items-center gap-2 ">
                <UsersIcon class="w-7" />
                Equipo
            </RouterLink>
            <RouterLink :to="{ name: 'home' }"
                class="text-gray-400 text-lg hover:text-white transition-colors duration-300 font-popins flex items-center gap-2 ">
                <FolderIcon class="w-7" />
                Proyectos
            </RouterLink>
            <RouterLink :to="{ name: 'home' }"
                class="text-gray-400 text-lg hover:text-white transition-colors duration-300 font-popins flex items-center gap-2 ">
                <DevicePhoneMobileIcon class="w-7" />
                Contactos
            </RouterLink>
            <RouterLink :to="{ name: 'home' }"
                class="text-gray-400 text-lg hover:text-white transition-colors duration-300 font-popins flex items-center gap-2 ">
                <HomeIcon class="w-7" />
                Incio
            </RouterLink>

        </nav>
    </aside>
</template>