<script setup>
// Imports
import { ref, defineProps } from 'vue'
import { Bars4Icon } from '@heroicons/vue/24/outline'
import Logo from '/logo.png'
// Components and Views
import NavLinks from './NavLinks.vue';
import NavLinkMobile from './NavLinkMobile.vue';

defineProps({
    users: Object
});

const open = ref(false);

const toggleMenu = () => {
    open.value = !open.value;
    // Si el menú se está cerrando, esperar a que termine la animación y luego ocultarlo
    if (!open.value) {
        menuClass.value = 'slideUp';
        setTimeout(() => {
            menuClass.value = 'hidden';
        }, 1000); // Ajusta el tiempo según la duración de la animación
    } else {
        menuClass.value = 'slideDown';
    }
};

</script>

<template>
    <header class="relative flex justify-between items-center px-2 py-5 md:px-20">
        <img :src="Logo" class="w-32 mt-2 md:mt-0 z-10" />

        <!-- NavLinks aparece solo en pantallas medianas -->
        <NavLinks class="hidden md:flex" :users="users" />

        <!-- Botón Mobile -->
        <button @click="toggleMenu" class="z-10 block md:hidden">
            <Bars4Icon class="w-8" />
        </button>

        <!-- NavLinkMobile -->
        <nav class="py-10 w-full absolute top-0 left-0 z-20"
            :class="open ? 'block bg-white slideDown' : 'slideUp menuClass hidden'">
            <!-- Aplicar la clase condicionalmente -->
            <NavLinkMobile :open="open" :toggleMenu="toggleMenu" />
        </nav>
    </header>
</template>

<style scoped>
.slideDown {
    animation-name: slideDown;
    -webkit-animation-name: slideDown;

    animation-duration: 1s;
    -webkit-animation-duration: 1s;

    animation-timing-function: ease;
    -webkit-animation-timing-function: ease;

    visibility: visible !important;
}

@keyframes slideDown {
    0% {
        transform: translateY(-100%);
    }

    50% {
        transform: translateY(1%);
    }

    65% {
        transform: translateY(1%);
    }

    80% {
        transform: translateY(0%);
    }

    95% {
        transform: translateY(0%);
    }

    100% {
        transform: translateY(0%);
    }
}

@-webkit-keyframes slideDown {
    0% {
        -webkit-transform: translateY(-100%);
    }

    50% {
        -webkit-transform: translateY(1%);
    }

    65% {
        -webkit-transform: translateY(1%);
    }

    80% {
        -webkit-transform: translateY(1%);
    }

    95% {
        -webkit-transform: translateY(0%);
    }

    100% {
        -webkit-transform: translateY(0%);
    }
}


.slideUp {
    animation-name: slideUp;
    -webkit-animation-name: slideUp;

    animation-duration: 1s;
    -webkit-animation-duration: 1s;

    animation-timing-function: ease;
    -webkit-animation-timing-function: ease;

    visibility: visible !important;
}

@keyframes slideUp {
    0% {
        transform: translateY(1%);
    }

    50% {
        transform: translateY(-90%);
    }

    65% {
        transform: translateY(-100%);
    }

    80% {
        transform: translateY(-100%);
    }

    95% {
        transform: translateY(-100%);
    }

    100% {
        transform: translateY(-100%);
    }
}
</style>
