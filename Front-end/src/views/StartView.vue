<script setup>
import { RouterView } from 'vue-router';
// Image and views
import Login from '/login-image.png'
</script>

<template>
    <div class="max-w-full h-screen flex justify-center items-center px-10 py-5">
        <RouterView class="w-1/2" />
        <div class="w-1/2">
            <p class="text-center font-popins text-title">Nos alegramos de verte de regreso</p>
            <h2 class="text-center font-popins font-bold text-4xl text-title">Bienvenido de vuelta!</h2>
            <img :src="Login" class="w-8/12 mx-auto" />
        </div>
    </div>
</template>
