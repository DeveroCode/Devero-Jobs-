import { useRouter } from "vue-router";
import { defineStore } from "pinia";
import { print, useNotificationStore } from "@/helpers/printErros";
import APIServices from "@/services/APIServices";

export const authMethods = defineStore('auth', () => {
    const router = useRouter();
    const notification = useNotificationStore();



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

    async function userLogin(datas, errores) {
        try {
            const { data } = await APIServices.login(datas);
            localStorage.setItem('AUTH_TOKEN', data.token);
            router.push({ name: 'dashboard' });
        } catch (error) {
            print(errores, error);
            console.error("Error en userLogin:", error);
        }
    }

    async function updateUser(datas, errores) {
        try {
            const response = await APIServices.update(datas);
            notification.mostrar = true;
            notification.texto = 'DeveroJobs';
            notification.error = false;
            notification.success = 'Usuario actualizado correctamente';
            router.push({ name: 'dashboard' });
        } catch (error) {
            print(errores, error);

            // console.log(error);
        }
    }

    async function getTypeUser(users) {
        try {
            const { data } = (await APIServices.type_user());
            users.value = data.data;
        } catch (error) {
            // console.log(error);
        }
    }

    async function dataUser(user) {
        try {
            const { data } = await APIServices.getUser();
            user.value = data
        } catch (error) {
            // console.log('Error al obtener los datos: ', error);
        }
    }


    return {
        userRegister,
        userLogin,
        updateUser,
        getTypeUser,
        dataUser
    }
});