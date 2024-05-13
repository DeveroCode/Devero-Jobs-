<script setup>
import { BellIcon } from '@heroicons/vue/24/outline';
import { ref, onMounted } from 'vue';
import { authMethods } from '@/stores/authMethods';

const { notifications } = authMethods();
const notify = ref([]);
const showPopup = ref(false);

onMounted(async () => {
    notify.value = await notifications();
});
</script>

<template>
    <div class="relative">
        <!-- Bolita de notificación -->
        <div class="absolute top-0 right-0 transform translate-x-1/4 -translate-y-1/4 bg-icons w-3 h-3 rounded-full"
            v-if="notify.length > 0">
        </div>

        <!-- Div principal -->
        <button class="bg-title text-white w-7 h-7 flex items-center justify-center rounded-full cursor-pointer"
            @click="showPopup = !showPopup">
            <!-- Icono de campana -->
            <BellIcon class="w-5 font-bold" />

            <section v-show="showPopup"
                class="absolute top-8 right-0 mt-1 w-64 h-auto py-2 bg-white bg-whites rounded-lg shadow-md">
                <div class="border-b px-5 py-3 border-gray-300">
                    <h3 class="text-title font-popins">Notificaciones</h3>
                </div>

                <div class="px-5 py-3">
                    <div v-if="notify.length > 0">
                        <div v-for="notification in notify" :key="notification.id"
                            class="border-b border-gray-300 py-3 text-start">
                            <p class="text-title text-sm font-popins capitalize">
                                Nueva notificación: <span class="font-bold">{{ notification.data.job_posting_title
                                    }}</span>
                            </p>
                        </div>
                    </div>
                    <p class="text-title font-popins" v-else>No hay notificaciones</p>
                </div>
            </section>
        </button>
    </div>
</template>