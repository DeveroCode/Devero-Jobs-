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
    <section class="mx-auto">
        <h1 class="text-4xl font-bold font-popins text-title">Iniciar Sesión</h1>
        <span class="text-sm text-gray-500 font-popins">Ingresa tus credenciales para acceder a tu panel de
            control</span>

        <div class="py-10 font-popins">
            <FormKit type="form" :actions="false" @submit="handleSubmit">
                <FormKit type="email" name="email" label="Email" placeholder="Email" v-model="user.email" />
                <FormKit type="password" name="password" label="Contraseña" placeholder="password"
                    v-model="user.password" />

                <div class="flex items-center mb-5 justify-between md:justify-normal md:gap-36">
                    <RouterLink :to="{ name: 'register' }" class="text-sm font-popins text-title">Crear cuenta
                    </RouterLink>

                    <RouterLink :to="{ name: 'home' }" class="text-sm font-popins text-title">
                        Olvidate la
                        contraseña?
                    </RouterLink>
                </div>

                <button class="py-2 px-6 bg-header rounded-md text-white font-popins uppercase">
                    Iniciar
                </button>
            </FormKit>
        </div>
    </section>
</template>