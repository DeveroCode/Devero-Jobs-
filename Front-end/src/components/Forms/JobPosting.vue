<script setup>
</script>

<template>
    <FormKit type="form" :actions="false">
        <!-- Campo 1 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Nombre del proyecto</h1>
                <span class="text-gray-500 text-sm font-popins">El nombre del proyecto debe ser claro y conciso, además
                    de ser descriptivo</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="text" name="name" placeholder="Ej: Desarrollo Web" />
            </div>
        </fieldset>

        <!-- Campo 2 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Descripción</h1>
                <span class="text-gray-500 text-sm font-popins">Coloca una breve descripción sobre el proyecto a
                    realizar.</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="textarea" name="edescription" placeholder="Ej: Desarrollo Web" />
            </div>
        </fieldset>

        <!-- Campo 3 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Tiempo</h1>
                <span class="text-gray-500 text-sm font-popins">Seleccione la modalidad o la duración deseada para la
                    realización del proyecto.</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="select" name="time" class="col-span-1 md:col-span-2">
                    <option disabled value="" class="capitalize">Selecciona</option>
                    <option value="" class="capitalize">Urgencia</option>
                    <option value="" class="capitalize">78 hrs</option>
                    <option value="" class="capitalize">1 Mes</option>
                    <option value="" class="capitalize">2 Meses</option>
                    <option value="" class="capitalize">6 Meses</option>
                </FormKit>
            </div>
        </fieldset>

        <!-- Campo 4 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Honorarios</h1>
                <span class="text-gray-500 text-sm font-popins w-full block">Coloca la cantidad máxima que pagarías por
                    este proyecto. La cantidad se tomará en dólares.</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="number" name="name" placeholder="Ej: Desarrollo Web" min="200" max="10000" />
            </div>
        </fieldset>

        <!-- Campo 5 -->
        <fieldset
            class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-gray-200 pb-5 mt-10">
            <div class="w-full md:w-1/3 mb-3 md:mb-0 md:mr-3">
                <h1 class="text-title font-popins font-bold">Imagen</h1>
                <span class="text-gray-500 text-sm font-popins w-full block">Una imagen con los requisitos que
                    necesitas, ayudaría al postulante</span>
            </div>
            <div class="w-full md:w-2/3">
                <FormKit type="file" name="image" accept=".pgn, .jpg, .png, .jpeg, .webp" />
            </div>
        </fieldset>
    </FormKit>
</template>