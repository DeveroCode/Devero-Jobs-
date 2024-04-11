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


const open = ref(false);

const toggleMenu = () => {
    open.value = !open.value
}


console.log(open.value);
</script>

<template>
    <div class="bg-main">
        <div class="grid grid-cols-12">
            <Aside class="md:col-span-2" :toggleMenu="toggleMenu"
                :class="open ? 'block w-[250px] fixed top-0 left-0 z-20 slideRight' : 'hidden lg:block'" />
            <div class="col-span-12 ml-0 lg:ml-60">
                <Search :toggleMenu="toggleMenu" />
                <RouterView :users="users" class=" left-48" />
            </div>
        </div>
    </div>
</template>


<style scoped>
.slideRight {
    animation-name: slideRight;
    -webkit-animation-name: slideRight;

    animation-duration: 1s;
    -webkit-animation-duration: 1s;

    animation-timing-function: ease-in-out;
    -webkit-animation-timing-function: ease-in-out;

    visibility: visible !important;
}

@keyframes slideRight {
    0% {
        transform: translateX(-150%);
    }

    50% {
        transform: translateX(0%);
    }

    65% {
        transform: translateX(0%);
    }

    80% {
        transform: translateX(0%);
    }

    95% {
        transform: translateX(0%);
    }

    100% {
        transform: translateX(0%);
    }
}
</style>