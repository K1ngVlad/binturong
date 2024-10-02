<script setup lang="ts">
    import { computed } from 'vue';
    import { usePage, Link } from '@inertiajs/vue3';
    import Button from '@/Components/Button.vue';
    import imgUrl from '../../assets/logo.png';

    const user = computed(() => usePage().props.auth.user);
</script>

<template>
    <header class="bg-white w-full h-16 flex items-center justify-between px-12 z-10">
        <Link class="h-full" :href="route('home')">
            <img class="h-full" alt="logo" :src="imgUrl"/>
        </Link>
        <template v-if="user">
            Ты авторизован
        </template>
        <template v-else>
            <Button is-link :href="route('login')">Войти</Button>
        </template>
    </header>
</template>