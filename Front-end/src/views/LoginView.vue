<script setup>
import { FormKit } from '@formkit/vue'
import { RouterLink } from 'vue-router';
</script>

<template>
    <section class="mx-auto">
        <h1 class="text-4xl font-bold font-popins text-title">Iniciar Sesión</h1>
        <span class="text-sm text-gray-500">Ingresa tus credenciales para acceder a tu panel de control</span>

        <div class="py-10 font-popins">
            <FormKit type="form" :actions="false">
                <FormKit type="email" name="email" label="Email" placeholder="Email" validation="required|email"
                    :validation-messages="{ required: 'El email es necesario para iniciar sesion', email: 'El email no es correcto' }"
                    validation-visibility="summit" />
                <FormKit type="password" name="password" label="Contraseña" placeholder="password"
                    validation="required|email"
                    :validation-messages="{ required: 'La contraseña es necesario para iniciar sesion' }"
                    validation-visibility="summit" />

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

<style>
.formkit-label {
    font-size: 1.1rem !important;
    font-weight: normal !important;
    font-family: Poppins, sans-serif !important;
    color: #31363F !important;
}
</style>