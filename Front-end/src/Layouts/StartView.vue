<script setup>
import { RouterView, RouterLink, useRoute } from 'vue-router';
// Image and views
import Logo from '/logo.png'
import Login from '/login-image.png'
import Register from '/register-image.png'

const router = useRoute();
</script>

<template>
    <div class="bg-white"
        :class="{ 'h-[670px] md:h-screen': $route.name === 'login', 'h-[670px] md:h-screen': $route.name === 'register' }">
        <div class="w-36 py-10 md:py-0">
            <RouterLink :to="{ name: 'home' }">
                <img :src="Logo" class="w-64 md:w-36 mx-auto md:mx-16 md:py-2" />
            </RouterLink>
        </div>
        <div class="flex flex-col max-w-7xl md:flex-row md:py-7 lg:justify-center md:items-center mx-auto 2xl:py-20">
            <RouterView class="px-10 md:w-1/2 w-full" />
            <div class="md:w-1/2 hidden md:block" v-if="router.name === 'login'">
                <p class="text-center font-popins text-title">Nos alegramos de verte de regreso</p>
                <h2 class="text-center font-popins font-bold text-4xl text-title">Bienvenido de vuelta!</h2>
                <img :src="Login" class="w-8/12 mx-auto" />
            </div>
            <div class="md:w-1/2 hidden md:block" v-else>
                <p class="text-center font-popins text-title">Unete al mejor equipo de desarrolladores</p>
                <h2 class="text-center font-popins font-bold text-4xl text-title">Bienvenido al equipo!</h2>
                <img :src="Register" class="w-8/12 mx-auto" />
            </div>
        </div>
    </div>
</template>
