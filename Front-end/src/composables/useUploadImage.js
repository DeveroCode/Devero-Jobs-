import { ref, watch } from 'vue';

export default function useImageUpload() {
    const image = ref({});
    const onFileChange = e => {
        const file = e.target.files[0];
        image.value = file
    }


    return {
        onFileChange,
        image
    }
}
