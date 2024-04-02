import { defineStore } from "pinia";
import { useRouter } from "vue-router";
import clientApi from "@/lib/axios";
import APIServices from "@/services/APIServices";
import useSWRV from "swrv";

export const authMethods = defineStore('users', () => {
    const router = useRouter();
    const token = localStorage.getItem('AUTH_TOKEN');

    const { data: user, error, mutate } = useSWRV('/api/user', () =>
        clientApi('/api/user', {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
            .then(res => res.data) // Asegúrate de que la respuesta contenga la propiedad 'data'
            .catch(error => {
                throw Error(error.response.data.erros)
            })
    );

    async function userRegister(data, errors) {
        try {
            const response = await APIServices.register(data);
        } catch (error) {
            console.log(error);
        }
    }


    return {
        userRegister,
    }
});