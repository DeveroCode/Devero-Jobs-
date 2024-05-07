<script setup>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
import { ref, onMounted } from 'vue';

import { authMethods } from '@/stores/authMethods';

const { dataUser } = authMethods();
const users = ref({});


onMounted(async () => {
    await dataUser(users)
});
</script>

<template>
    <div class="max-w-full">
        <Header />
        <RouterView :users="users" />
        <Footer />
    </div>
</template>