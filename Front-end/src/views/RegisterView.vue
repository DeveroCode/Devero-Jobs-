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
    <section class="mx-auto my-0 2xl:my-[4%]">
        <h1 class="text-4xl font-bold font-popins text-title">Registrarse</h1>
        <span class="text-sm text-gray-500">Crea una cuenta para enterarte del avance de tu proyecto</span>
        <div class="py-10 font-popins">

            <!-- Formulario -->
            <FormKit type="form" :actions="false" @submit="handleSubmit"
                class="grid grid-cols-1 gap-y-6 md:grid-cols-2">
                <FormKitMessages />
                <FormKit type="text" name="name" label="Nombre(s)" v-model="user.name" placeholder="Ej: Mauricio Jesús"
                    class="col-span-1 md:col-span-2" />

                <FormKit type="text" name="apellidos" label="Apellido(s)" v-model="user.apellidos"
                    placeholder="Incluye un apellido" class="col-span-1 md:col-span-2" />

                <FormKit type="select" v-model="user.type_user" name="type_user" label="Rol"
                    class="col-span-1 md:col-span-2">
                    <option disabled value="" class="capitalize">Selecciona tu rol</option>
                    <option v-for="user in typeUser.value" :value="user.id" :id="user.id" :key="user.id"
                        class="capitalize">{{ user.name }}
                    </option>
                </FormKit>

                <FormKit type="email" v-model="user.email" name="email" label="Email" placeholder="Email"
                    class="col-span-1 md:col-span-2" />

                <FormKit type="password" name="password" v-model="user.password" label="Contraseña"
                    placeholder="password" class="col-span-1 md:col-span-2" />

                <RouterLink :to="{ name: 'login' }"
                    class="text-sm mb-2 block md:text-end md:mt-2 2md:w-[74%] md:w-[62%] 2xl:w-[72%] font-popins text-title col-span-2 2xl:text-lg">
                    Ya tengo una cuenta
                </RouterLink>

                <input type="submit" class="py-2 px-6 bg-header rounded-md text-white font-popins uppercase col-span-2"
                    value="Registrarse">
            </FormKit>
        </div>
    </section>

</template>