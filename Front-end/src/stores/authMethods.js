import { useRouter } from "vue-router";
import clientApi from "@/lib/axios";
import { print, useNotificationStore } from "@/helpers/printErros";
import APIServices from "@/services/APIServices";
import useSWRV from "swrv"
import { defineStore } from "pinia";

export const authMethods = defineStore('auth', () => {
    const router = useRouter();
    const notification = useNotificationStore();
    const token = localStorage.getItem('AUTH_TOKEN');

    const { data: user } = useSWRV('/api/user', () =>
        clientApi('/api/user', {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
            .then(res => res.data) // Asegúrate de que la respuesta contenga la propiedad 'data'
            .catch(error => {
                throw Error(error.response.data.errors)
            }),
        {
            revalidateOnMount: true

        }
    );

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
            console.error("Error en userLogin:", error);
        }
    }

    async function userLogin(datas, errores) {
        try {
            const { data } = await APIServices.login(datas);
            localStorage.setItem('AUTH_TOKEN', data.token);
        } catch (error) {
            print(errores, error);
            console.error("Error en userLogin:", error);
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
        userLogin,
        getTypeUser,
        user
    }
});