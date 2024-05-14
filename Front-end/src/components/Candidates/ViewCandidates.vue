<script setup>
import { defineProps } from 'vue';


const props = defineProps({
    dataProject: Object
});
</script>

<template>
    <h2>Mis candidatos {{ props.dataProject }}</h2>
</template>