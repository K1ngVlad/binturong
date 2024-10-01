<script setup lang="ts">
    defineProps<{
        title: string;
        error?: string;
    }>();
</script>

<template>
    <label class="relative">
        <div class="flex items-center">
            <h3 class="w-24">{{ title }}</h3>
            <slot></slot>
        </div>
        <div class="text-red-600 absolute left-1 bottom-[-22px]">
            <span>{{ error }}</span>
        </div>
    </label>
</template>