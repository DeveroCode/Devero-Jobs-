<script setup>
import { reactive, ref } from 'vue';
import { FormKit } from '@formkit/vue'
import { RouterLink } from 'vue-router';
import { authMethods } from '@/stores/authMethods';

const { userLogin } = authMethods();
const errores = ref([]);

const user = reactive({
    email: '',
    password: '',
})

const handleSubmit = () => {
    const data = {
        email: user.email,
        password: user.password
    }

    userLogin(data, errores);
}

</script>

<template>
    <section class="mx-auto py-0 md:py-20">
        <h1 class="text-4xl font-bold font-popins text-title">Iniciar Sesión</h1>
        <span class="text-sm text-gray-500 font-popins">Ingresa tus credenciales para acceder a tu panel de
            control</span>

        <div class="py-10 font-popins">
            <FormKit type="form" :actions="false" @submit="handleSubmit">
                <FormKit type="email" name="email" label="Email" placeholder="Email" v-model="user.email" />
                <FormKit type="password" name="password" label="Contraseña" placeholder="password"
                    v-model="user.password" />

                <div class="flex items-center mb-5 justify-between md:w-9/12 lg:w-10/12 3xl:w-[320px]">
                    <RouterLink :to="{ name: 'register' }" class="text-sm 3xl:text-md font-popins text-title">Crear
                        cuenta
                    </RouterLink>

                    <RouterLink :to="{ name: 'home' }" class="text-sm font-popins text-title 3xl:text-md">
                        Olvidaste la
                        contraseña?
                    </RouterLink>
                </div>

                <button type="submit"
                    class="py-2 px-6 bg-header rounded-md text-white font-popins uppercase cursor-pointer">
                    Iniciar
                </button>
            </FormKit>
        </div>
    </section>
</template>