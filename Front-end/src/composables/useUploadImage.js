import { ref } from 'vue';

export default function useImageUpload() {
    const image = ref({});
    const imageUrl = ref('');

    const onFileChange = e => {
        const file = e.target.files[0];
        image.value = file

        if (file) {
            // Here validate new image
            imageUrl.value = URL.createObjectURL(file);

        } else {
            imageUrl.value = '';
        }
    }


    return {
        onFileChange,
        image,
        imageUrl
    }
}
