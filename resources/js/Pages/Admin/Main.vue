<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import AuthorizedLayout from '@/Layouts/AuthorizedLayout.vue';
</script>

<template>
    <BaseLayout>
        <AuthorizedLayout> 
            <!-- <Link class="filter w-36 ml-10" :href="route('import')">Импортировать</Link> -->
             <div class="mt-10">
                <Link class="filter w-36 p-2" :href="route('import')">Импортировать</Link>
                <Link class="filter w-36 p-2" :href="route('main')">Права доступа</Link>
                <Link class="filter w-36 p-2" :href="route('main')">Экспортировать логи</Link>
             </div> 
        </AuthorizedLayout>
    </BaseLayout>
</template>