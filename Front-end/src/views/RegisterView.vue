<script setup>
</script>

<template>
    <section class="mx-auto">
        <h1 class="text-4xl font-bold font-popins text-title">Registrarse</h1>
        <span class="text-sm text-gray-500">Crea una cuenta para enterarte del avance de tu proyecto</span>

        <div class="py-10 font-popins">
            <FormKit type="form" :actions="false">
                <FormKit type="text" name="name" label="Nombre(s)" placeholder="Ej: Mauricio Jesús"
                    validation="required"
                    :validation-messages="{ required: 'El nombre es necesario para iniciar sesion' }"
                    validation-visibility="summit" />
                <FormKit type="text" name="apellidos" label="Apellido(s)" placeholder="Incluye un apellido ó ambos"
                    validation="required" :validation-messages="{ required: 'El campo apellido es necesario' }"
                    validation-visibility="summit" />

                <FormKit type="email" name="email" label="Email" placeholder="Email" validation="required|email"
                    :validation-messages="{ required: 'El email es necesario para iniciar sesion', email: 'El email no es correcto' }"
                    validation-visibility="summit" />
                <FormKit type="password" name="password" label="Contraseña" placeholder="password"
                    validation="required|email"
                    :validation-messages="{ required: 'La contraseña es necesario para iniciar sesion' }"
                    validation-visibility="summit" />

                <FormKit type="password" name="password" label="Repetir Contraseña" placeholder="Repetir password"
                    validation="required|email"
                    :validation-messages="{ required: 'La contraseña es necesario para iniciar sesion' }"
                    validation-visibility="summit" />

                <RouterLink :to="{ name: 'login' }"
                    class="text-sm md:w-[62%] mb-2 block md:text-end font-popins text-title">
                    Ya tengo una cuenta
                </RouterLink>

                <button class="py-2 px-6 bg-header rounded-md text-white font-popins uppercase">
                    Registrarse
                </button>
            </FormKit>
        </div>
    </section>
</template>