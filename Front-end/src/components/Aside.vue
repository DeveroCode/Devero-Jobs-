<script setup>
import { defineProps } from 'vue';
import { RouterLink } from 'vue-router';
import { ChartBarSquareIcon, UsersIcon, FolderIcon, DevicePhoneMobileIcon, HomeIcon, ArrowRightEndOnRectangleIcon, BriefcaseIcon } from '@heroicons/vue/24/outline'
import { authMethods } from '@/stores/authMethods';
import Logo from '/logo.png'

const { logout } = authMethods();

defineProps({
    toggleMenu: Function,
    users: Object
});

</script>

<template>
    <aside class="w-72.5 flex-col bg-title fixed top-0 left-0 w-[250px] h-screen">
        <!-- SIDEBAR HEADER -->
        <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
            <RouterLink class="hidden lg:block" :to="{ name: 'home' }">
                <img :src="Logo" alt="Logo" class="py-10" />
            </RouterLink>


            <button class="block lg:hidden" @click="toggleMenu">
                <img :src="Logo" alt="Logo" class="py-10" />
            </button>

            <!-- Here will go the responsive button  -->
        </div>

        <div class="flex flex-col duration-300 ease-linear">
            <!-- Sidebar Menu -->
            <nav class="mt-5 px-4 lg:px-6">
                <div>
                    <h3 class="mb-4 ml-4 text-gray-400 uppercase font-popins">menu</h3>

                    <ul class="mb-6 flex flex-col gap-1.5 space-y-4">
                        <RouterLink :to="{ name: 'dashboard' }"
                            class="flex px-3 hover:text-back transition-colors duration-300 gap-5 items-center font-popins text-white">
                            <ChartBarSquareIcon class="w-7" />
                            Dashboard
                        </RouterLink>

                        <RouterLink :to="{ name: 'proyectos' }"
                            class="flex px-3 hover:text-back transition-colors duration-300 gap-5 items-center font-popins text-white">
                            <FolderIcon class="w-7" />
                            Proyectos
                        </RouterLink>

                        <RouterLink :to="{ name: 'publicar' }" v-if="users.type_user_id === 1"
                            class="flex px-3 hover:text-back transition-colors duration-300 gap-5 items-center font-popins text-white">
                            <BriefcaseIcon class="w-7" />
                            Publicar
                        </RouterLink>

                        <RouterLink :to="{ name: 'perfil' }"
                            class="flex px-3 hover:text-back transition-colors duration-300 gap-5 items-center font-popins text-white">
                            <UsersIcon class="w-7" />
                            Profile
                        </RouterLink>

                        <RouterLink :to="{ name: 'home' }" v-on="{ click: logout }"
                            class="flex px-3 hover:text-back transition-colors duration-300 gap-5 items-center font-popins text-white">
                            <DevicePhoneMobileIcon class="w-7" />
                            Contactos
                        </RouterLink>
                    </ul>
                </div>


                <div>
                    <h3 class="mb-4 ml-4 text-gray-400 uppercase font-popins">otros</h3>

                    <ul class="mb-6 flex flex-col gap-1.5 space-y-4">
                        <RouterLink :to="{ name: 'home' }"
                            class="flex px-3 hover:text-back transition-colors duration-300 gap-5 items-center font-popins text-white">
                            <HomeIcon class="w-7" />
                            Incio
                        </RouterLink>

                        <button @click="logout"
                            class="flex px-3 hover:text-back transition-colors duration-300 gap-5 items-center font-popins text-white capitalize">
                            <ArrowRightEndOnRectangleIcon class="w-7" />
                            cerrar sesión
                        </button>
                    </ul>
                </div>
            </nav>
        </div>
    </aside>
</template>