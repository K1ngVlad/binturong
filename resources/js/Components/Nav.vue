<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';
    import Button from './Button.vue';
</script>

<template>
    <nav>
        <li class="flex px-10 py-4">
            <ul class="navElem">
                <Button class-name="navButton" is-link :href="route('main')">Главная</Button>
            </ul>
            <ul class="navElem">
                <Button class-name="navButton" is-link :href="route('projects')">Реестр проектов</Button>
            </ul>
            <ul class="navElem">
                <Button class-name="navButton" is-link :href="route('libary')">Библиотека</Button>
            </ul>
            <ul class="navElem">
                <Button class-name="navButton" is-link :href="route('admin')">Управление проектами</Button>
            </ul>
        </li>
    </nav>
</template>

<style lang="css">
    .navButton {
        width: 240px;
    }

    .navElem + .navElem {
        margin-left: 36px;
    }
</style>