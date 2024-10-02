<script setup lang="ts">
    import Button from '@/Components/Button.vue';
</script>

<template>
    <Button is-link :href="route('admin')">Назад</Button>
    <div class="mt-10">
        <slot></slot>
    </div>
</template>