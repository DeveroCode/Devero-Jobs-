import { ref, watch } from "vue";
import { defineStore } from "pinia";
// import { useNotificationStore } from "../stores/notification";
// const notification = useNotificationStore();
export const useNotificationStore = defineStore('notification', () => {

    const texto = ref('');
    const errors = ref({});
    const error = ref(false);
    const mostrar = ref(false);
    const success = ref('');

    watch(mostrar, () => {
        setTimeout(() => {
            texto.value = '';
            error.value = false;
            mostrar.value = false;
            success.value = ''
        }, 5000);
    });

    return {
        texto, error, mostrar, errors, success
    }
});

export function print(errores, error) {
    // Definicion de los errores
    const notification = useNotificationStore();
    let e = []; // Almacenamos los errores en un array de nuevo
    const erro = error.response.data.errors;
    for (const key in erro) {
        if (erro.hasOwnProperty(key)) {
            e.push(erro[key][0]); // Con el if los convetirmos a string y los renderisamos en la variable e
        }
    }
    errores.value = e;
    // Fin de los errores
    notification.mostrar = true;
    notification.texto = texto.value;
    notification.error = true;
    notification.errors = errores.value; // Alamacenamos solo los errores en string
}