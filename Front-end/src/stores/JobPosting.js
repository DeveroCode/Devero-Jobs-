import { useRouter } from "vue-router";
import { defineStore } from "pinia";
import { print, useNotificationStore } from "@/helpers/printErros";
import APIServices from "@/services/APIServices";

export const jobPosting = defineStore('job', () => {

    const notification = useNotificationStore();
    const router = useRouter();

    async function registerProject(data, errores) {
        try {
            const response = await APIServices.registerProject(data);
            notification.mostrar = true;
            notification.texto = 'DeveroJobs';
            notification.error = false;
            notification.success = 'Proyecto publicado correctamente';
            router.push({ name: 'proyectos' });
        } catch (error) {
            print(errores, error);
        }
    }

    async function timeJob(time) {
        try {
            const { data } = await APIServices.getTime();
            time.value = data.data
        } catch (error) {
            console.log(error.response.data.message);
        }
    }

    return {
        timeJob,
        registerProject,
    }
});