<script setup>
import { authMethods } from '@/stores/authMethods';
import { reactive, onMounted, ref } from 'vue';
import { FormKitMessages } from '@formkit/vue';
// Components and views

const errores = ref([])
const { userRegister, getTypeUser } = authMethods();
const typeUser = reactive({});
const user = reactive({
    name: '',
    apellidos: '',
    type_user: '',
    email: '',
    password: '',
});

const typeUsers = () => {
    getTypeUser(typeUser)
}
onMounted(() => {
    typeUsers();
});

const handleSubmit = () => {
    const data = {
        name: user.name,
        apellidos: user.apellidos,
        type_user: user.type_user,
        email: user.email,
        password: user.password
    }

    userRegister(data, errores);
}
</script>

<template>
    <section class="mx-auto">
        <h1 class="text-4xl font-bold font-popins text-title">Registrarse</h1>
        <span class="text-sm text-gray-500">Crea una cuenta para enterarte del avance de tu proyecto</span>
        <FormKit type="form" :actions="false" @submit="handleSubmit">
            <FormKit type="text" name="name" label="Nombre(s)" v-model="user.name" placeholder="Ej: Mauricio Jesús" />

            <FormKit type="text" name="apellidos" label="Apellido(s)" v-model="user.apellidos"
                placeholder="Incluye un apellido" />

            <FormKit type="select" v-model="user.type_user" name="type_user" label="Rol"
                class="col-span-1 md:col-span-2">
                <option disabled value="" class="capitalize">Selecciona tu rol</option>
                <option v-for="user in typeUser.value" :value="user.id" :id="user.id" :key="user.id" class="capitalize">
                    {{ user.name }}
                </option>
            </FormKit>

            <FormKit type="email" v-model="user.email" name="email" label="Email" placeholder="Email" />

            <FormKit type="password" name="password" v-model="user.password" label="Contraseña"
                placeholder="password" />

            <RouterLink :to="{ name: 'login' }"
                class="text-sm mb-2 block md:text-end md:mt-2 md:w-10/12 3xl:w-[320px] 3xl:mb-4 font-popins text-title col-span-2 2xl:text-lg">
                Ya tengo una cuenta
            </RouterLink>

            <input type="submit"
                class="py-2 px-6 cursor-pointer bg-header rounded-md text-white font-popins uppercase col-span-2"
                value="Registrarse">
        </FormKit>
    </section>

</template>