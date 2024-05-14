import { useRouter } from "vue-router";
import { defineStore } from "pinia";
import { print, useNotificationStore } from "@/helpers/printErros";
import clientApi from "@/lib/axios";
import APIServices from "@/services/APIServices";

export const authMethods = defineStore('auth', () => {
    const router = useRouter();
    const notification = useNotificationStore();
    const token = localStorage.getItem('AUTH_TOKEN');



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
            if (error.response.status === 500) {
                notification.mostrar = false;
                notification.texto = 'Error al actualizar el usuario';
                notification.error = true;
                notification.success = 'La contraseña es requerida para guardar cambios';
            } else if (error.response.status === 422) {
                notification.mostrar = false;
                notification.texto = 'Error al actualizar el usuario';
                notification.error = true;
                notification.success = 'La contraseñas no coinciden';
            }
            print(errores, error);

            // console.log(error);
        }
    }

    function logout() {
        return clientApi.post('/api/logout', null, {
            headers: {
                Authorization: `Bearer ${token}`
            }

        }).then(() => {
            notification.mostrar = true;
            notification.texto = 'DeveroJobs';
            notification.error = false;
            notification.success = 'Sesión cerrada correctamente';
            localStorage.removeItem('AUTH_TOKEN');
            router.push({ name: 'login' });
        });
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

    async function notifications() {
        try {
            const { data } = await APIServices.getNotifications();
            return data;
        } catch (error) {
            notification.mostrar = false;
            notification.texto = 'Error';
            notification.error = true;
            notification.success = 'Revisa tu conexión a internet';
        }
    }


    return {
        userRegister,
        userLogin,
        updateUser,
        logout,
        getTypeUser,
        dataUser,
        notifications
    }
});