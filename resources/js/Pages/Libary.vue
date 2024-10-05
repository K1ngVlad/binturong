<script setup lang="ts">
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import AuthorizedLayout from '@/Layouts/AuthorizedLayout.vue';
</script>

<template>
    <BaseLayout>
        <AuthorizedLayout>
            <h3 class="text-3xl p-10">Библиотека</h3>
            <ol class="p-10">
                <li>
                    1. <a class="underline" :href="route('download')">projects.xlsx</a>
                </li>
            </ol>
        </AuthorizedLayout>
    </BaseLayout>
</template>