<script setup>
import Aside from '../components/Aside.vue'
</script>

<template>
    <div class="bg-blue-100 h-screen">
        <div class="grid grid-cols-4">
            <Aside class="col-span-1" />
            <div class="col-span-3 mt-10 px-10">
                <RouterView />
            </div>
        </div>
    </div>
</template>