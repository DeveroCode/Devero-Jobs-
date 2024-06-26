import { ref, watch } from "vue";
import { defineStore } from "pinia";

export const useNotificationStore = defineStore('notification', () => {

    const texto = ref('');
    const errors = ref({});
    const error = ref(false);
    const mostrar = ref(false);
    const success = ref('');

    watch(mostrar, () => {
        setTimeout(() => {
            texto.value = ''
            error.value = false
            mostrar.value = false,
                success.value = ''
        }, 3000);
    });

    return {
        texto, error, mostrar, errors, success
    }
});