<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
    defineProps<{
        link: string
    }>();
</script>

<template>
    <div class="w-full h-full flex justify-center items-center">
        <div class="p-10">
            <a :href="route('download')">Загрузить файл</a>
        </div>
    </div>
</template>