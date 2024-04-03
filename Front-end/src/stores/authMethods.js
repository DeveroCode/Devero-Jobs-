import { ref } from "vue";
import { defineStore } from "pinia";
import { useRouter } from "vue-router";
import { print, useNotificationStore } from "@/helpers/printErros";
import APIServices from "@/services/APIServices";
import useSWRV from "swrv";

export const authMethods = defineStore('users', () => {
    const router = useRouter();
    const notification = useNotificationStore();
    const token = localStorage.getItem('AUTH_TOKEN');
    // const errores = ref({});

    // const { data: user, error, mutate } = useSWRV('/api/user', () =>
    //     clientApi('/api/user', {
    //         headers: {
    //             Authorization: `Bearer ${token}`
    //         }
    //     })
    //         .then(res => res.data) // Asegúrate de que la respuesta contenga la propiedad 'data'
    //         .catch(error => {
    //             throw Error(error.response.data.erros)
    //         })
    // );

    async function userRegister(datas, errors) {
        try {
            const response = await APIServices.register(datas);
            notification.mostrar = true;
            notification.texto = 'Bienvenido a DeveroJobs';
            notification.error = false;
            notification.success = 'Usuario registrado correctamente';
            router.push({ name: 'login' });
        } catch (error) {
            print(errors, error);
        }
    }

    async function getTypeUser(users) {
        try {
            const { data } = (await APIServices.type_user());
            users.value = data.data;
        } catch (error) {
            console.log(error);
        }
    }

    return {
        userRegister,
        getTypeUser
    }
});