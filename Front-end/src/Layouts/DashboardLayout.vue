<script setup>
import Aside from '@/components/Aside.vue'
import Search from '@/components/SearchProjects.vue';
</script>

<template>
    <div class="bg-main">
        <div class="grid grid-cols-12">
            <Aside class="col-span-2" />
            <div class="col-span-10">
                <Search />
                <RouterView />
            </div>
        </div>
    </div>
</template>
