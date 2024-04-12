import { useRouter } from "vue-router";
import { defineStore } from "pinia";
import { print, useNotificationStore } from "@/helpers/printErros";
import clientApi from "@/lib/axios";
import APIServices from "@/services/APIServices";

export const jobPosting = defineStore('job', () => {

    const router = useRouter();

    async function registerProject(datas, errores) {
        try {
            const { data } = await APIServices.registerProject(datas);
        } catch (error) {
            console.log(error);
        }
    }

    async function timeJob(time) {
        try {
            const { data } = await APIServices.getTime();
            time.value = data.data
        } catch (error) {
            console.log(error);
        }
    }

    return {
        timeJob,
        registerProject,
    }
});