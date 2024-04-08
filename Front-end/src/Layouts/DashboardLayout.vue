<script setup>
import { onMounted, ref } from 'vue';
import Aside from '@/components/Aside.vue'
import Search from '@/components/SearchProjects.vue';
import { authMethods } from '@/stores/authMethods';

const { dataUser } = authMethods();
const users = ref([]);


onMounted(async () => {
    await dataUser(users)
});
</script>

<template>
    <div class="bg-main">
        <div class="grid grid-cols-12">
            <Aside class="col-span-2" />
            <div class="col-span-10">
                <Search />
                <RouterView :users="users" />
            </div>
        </div>
    </div>
</template>
