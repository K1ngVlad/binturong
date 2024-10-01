<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav>
        <li class="flex">
            <ul>
                <Link :href="route('main')">Главная</Link>
            </ul>
            <ul>
                <Link :href="route('projects')">Реестр проектов</Link>
            </ul>
            <ul>
                <Link :href="route('libary')">Библиотека</Link>
            </ul>
            <ul>
                <Link :href="route('admin')">Управление проектами</Link>
            </ul>
        </li>
    </nav>
</template>