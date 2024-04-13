<script setup>
</script>

<template>
    <section class="hidden md:block space-x-10 text-gray-500">
        <RouterLink :to="{ name: 'home' }" class="hover:text-black">Home</RouterLink>
        <RouterLink :to="{ name: 'home' }" class="hover:text-black">Categorias</RouterLink>
        <RouterLink :to="{ name: 'projects' }" class="hover:text-black">Proyectos</RouterLink>
        <RouterLink :to="{ name: 'home' }" class="hover:text-black">Empresas</RouterLink>
        <RouterLink :to="{ name: 'home' }" class="hover:text-black">Sobre Nosotros</RouterLink>
    </section>

    <section class="hidden md:block space-x-10">
        <RouterLink :to="{ name: 'login' }"
            class="relative px-5 py-3 overflow-hidden font-medium text-gray-600 bg-buttons rounded-sm shadow-inner group">
            <span
                class="absolute top-0 left-0 w-0 h-0 transition-all duration-200 border-t-2 border-gray-600 group-hover:w-full ease"></span>
            <span
                class="absolute bottom-0 right-0 w-0 h-0 transition-all duration-200 border-b-2 border-gray-600 group-hover:w-full ease"></span>
            <span
                class="absolute top-0 left-0 w-full h-0 transition-all duration-300 delay-200 bg-gray-600 group-hover:h-full ease"></span>
            <span
                class="absolute bottom-0 left-0 w-full h-0 transition-all duration-300 delay-200 bg-gray-600 group-hover:h-full ease"></span>
            <span
                class="absolute inset-0 w-full h-full duration-300 delay-300 bg-gray-900 opacity-0 group-hover:opacity-100"></span>
            <span class="relative transition-colors duration-300 delay-200 group-hover:text-white ease">Login</span>
        </RouterLink>
        <RouterLink :to="{ name: 'register' }" class="rounded-sm border border-header px-2 py-3">
            Registrarse
        </RouterLink>
    </section>
</template>