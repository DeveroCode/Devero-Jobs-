<script setup>
import { Bars4Icon } from '@heroicons/vue/24/outline';
import { defineProps } from 'vue';
import Notifications from '@/components/Notifications.vue'

const props = defineProps({
    toggleMenu: Function,
    users: Object
});
</script>

<template>
    <header class="w-full flex justify-between bg-white border-b-2 border-gray-300 py-4 shadow-sm">
        <div className="flex flex-col sm:flex-row items-center justify-center">
            <button @click="toggleMenu">
                <Bars4Icon class="w-7 block xl:hidden" />
            </button>
            <input type="text"
                className="w-4/12 md:w-[800px] md:pl-14 rounded-l-md py-3 px-4 border border-none focus:outline-none bg-secondary mb-3 sm:mb-0"
                placeholder="Ej: Diseño web para paquime" />
            <button className="bg-title text-white font-bold py-3 px-4 rounded-r-md">
                Buscar
            </button>
        </div>


        <div className="flex flex-row items-center pr-20">
            <div>
                <Notifications />
            </div>


            <div class="pl-2">
                <p class="text-title text-sm font-semibold font-popins">{{ users.username }}</p>
                <p class="text-title text-xs font-light">{{ users.type_user_id }}</p>
            </div>
            <img :src="users.image" class="w-12" />
        </div>
    </header>
</template>