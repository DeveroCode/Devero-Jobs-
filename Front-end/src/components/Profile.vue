<script setup>
import { defineProps, ref } from 'vue';
import { authMethods } from '@/stores/authMethods';
import useIMageUpload from '@/composables/useUploadImage';

const { onFileChange, image } = useIMageUpload();

defineProps({
    users: Object // 
});

const errores = ref([]);
const { updateUser } = authMethods();

const handleSubmit = users => {
    const data = {
        name: users.name,
        apellidos: users.apellidos,
        email: users.email,
        username: users.username,
        password: users.password,
        password_confirmation: users.password_confirmation,
    }
    updateUser(data, errores)
};

const handeleImageSubmit = users => {
    const data = {
        image: image.value
    }

    console.log(data);
    // updateUser(data, errores)
}
</script>

<template>
    <main class="py-10 2xl:py-32 px-10">
        <h1 class="text-title font-popins font-bold text-2xl">Ajustes</h1>

        <section class="flex flex-col lg:flex-row md:justify-between py-10 2xl:py-16">
            <!-- Information -->
            <div class="bg-white rounded-sm shadow-md border border-gray-300 md:w-[60%]">
                <div class="border-b border-stroke py-4 px-7">
                    <p class="text-title font-popins text-md capitalize">
                        información personal
                    </p>
                </div>

                <div class="py-10 px-10 mx-auto">
                    <FormKit type="form" :actions="false" @submit="handleSubmit">
                        <fieldset class="flex flex-col md:flex-row md:justify-between">
                            <div class="w-full md:w-1/2 mb-3 md:mb-0 md:mr-3">
                                <FormKit type="text" name="name" label="Nombre(s)" placeholder="Ej: Carlos ALberto"
                                    v-model="users.name" />
                            </div>
                            <div class="w-full md:w-1/2 mb-3 md:mb-0 md:mr-3">
                                <FormKit type="text" name="apellidos" label="Apellido(s)" placeholder="Ej: Martinez"
                                    v-model="users.apellidos" />
                            </div>
                        </fieldset>

                        <fieldset class="flex flex-col md:flex-row md:justify-between">
                            <div class="w-full md:w-1/2 mb-3 md:mb-0 md:mr-3">
                                <FormKit type="email" name="email" label="Correo" placeholder="Ej: Devero@code.com"
                                    validation="required|email"
                                    :validation-messages="{ required: 'El email no debe ser vacío', email: 'El email no es correcto' }"
                                    validation-visibility="summit" v-model="users.email" />
                            </div>
                            <div class="w-full md:w-1/2 mb-3 md:mb-0 md:mr-3">
                                <FormKit type="text" name="username" label="Username" placeholder="Ej: DeveroCode"
                                    v-model="users.username" />
                            </div>
                        </fieldset>


                        <!-- Confirmed the password for update profile -->
                        <div class="flex justify-between flex-col md:flex-row">
                            <div class="w-full md:w-1/2 mb-3 md:mb-0 md:mr-3">
                                <FormKit type="password" name="password" label="Password" placeholder="password"
                                    v-model="users.password" />
                            </div>
                            <div class="w-full md:w-1/2 mb-3 md:mb-0 md:mr-3">
                                <FormKit type="password" name="password_confirmation" label="Repetir Password"
                                    placeholder="confirma tu password" v-model="users.password_confirmation" />
                            </div>
                        </div>

                        <div class="flex md:flex-row flex-col justify-end gap-5 pr-0 md:pr-14">
                            <button
                                class="py-2 w-full md:w-1/4 mt-6 px-6 rounded-md border border-title text-title font-popins uppercase">
                                Cancelar
                            </button>
                            <button
                                class="py-2 w-full md:w-1/4 mt-6 px-6 bg-header rounded-md text-white font-popins uppercase">
                                Guardar
                            </button>
                        </div>
                    </FormKit>
                </div>
            </div>
            <!-- Image Profile -->
            <div class="w-full mt-10 lg:mt-0 lg:w-1/3">
                <div class="bg-white rounded-sm shadow-md border border-gray-300">
                    <div class="border-b border-stroke py-4 px-7">
                        <p class="text-title font-popins text-md capitalize">
                            Fotografia
                        </p>
                    </div>

                    <div class="py-10 px-10">
                        <FormKit type="form" :actions="false" @submit="handeleImageSubmit">
                            <FormKit type="file" name="image" label="Fotografia" accept="image/*" v-model="users.image"
                                @change="onFileChange" />

                            <div class="flex justify-end gap-10">
                                <button
                                    class="py-2 mt-6 px-6 rounded-md border border-title text-title font-popins uppercase">
                                    Cancelar
                                </button>
                                <button class="py-2 mt-6 px-6 bg-header rounded-md text-white font-popins uppercase">
                                    Guardar
                                </button>
                            </div>
                        </FormKit>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>