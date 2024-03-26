<script setup>
</script>

<template>
    <section>
        <h1 class="text-4xl font-bold font-popins text-title">Iniciar Sesión</h1>
        <span class="text-sm text-gray-500">Ingresa tus credenciales para acceder a tu panel de control</span>

        <el-form novalidate class="py-10" label-position="top">
            <el-form-item label="Email" class="font-popins text-4xl">
                <el-input type="text" placeholder="Email" size="large" />
            </el-form-item>
            <el-form-item label="Password" class="font-popins text-4xl">
                <el-input type="password" placeholder="Password" size="large" />
            </el-form-item>

            <el-button color="#222831" type="primary" class="w-1/5 bg-header">Iniciar</el-button>
        </el-form>
    </section>
</template>