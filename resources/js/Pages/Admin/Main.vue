<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import AuthorizedLayout from '@/Layouts/AuthorizedLayout.vue';
</script>

<template>
    <BaseLayout>
        <AuthorizedLayout> 
            <Link :href="route('import')">Импортировать</Link>
        </AuthorizedLayout>
    </BaseLayout>
</template>