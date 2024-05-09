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

    async function projects(project) {
        try {
            const { data } = await APIServices.getProjects();
            project.value = data.data
        } catch (error) {
            console.log(error);
        }
    }

    async function getProject(id) {
        try {
            const data = await APIServices.getProject(id);
            return data.data
        } catch (error) {
            console.log(error);
        }
    }

    async function updateProject(datas, errores) {
        try {
            const data = await APIServices.updateProject(datas);
            notification.mostrar = true;
            notification.texto = 'DeveroJobs';
            notification.error = false;
            notification.success = 'Proyecto actualizado correctamente';
            router.push({ name: 'proyectos' });
        } catch (error) {
            print(errores, error);
        }
    }

    async function createCandidate(candidate, errores) {
        try {
            const data = await APIServices.candidate(candidate);
            notification.mostrar = true;
            notification.texto = 'DeveroJobs';
            notification.error = false;
            notification.success = 'Postulacion enviada correctamente';
            router.push({ name: 'dashboard' });
        } catch (error) {
            if (error.response) {
                print(errores, error);
            }
        }
    }

    return {
        timeJob,
        registerProject,
        projects,
        getProject,
        updateProject,
        createCandidate
    }
});