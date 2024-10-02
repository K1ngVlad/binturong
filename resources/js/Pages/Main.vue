<script setup lang="ts">
    import { computed } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import AuthorizedLayout from '@/Layouts/AuthorizedLayout.vue';

    const user = computed(() => usePage().props.auth.user);
</script>

<template>
    <BaseLayout>
        <AuthorizedLayout>
            <div class="p-10">
                <h3 class="text-2xl">Вы вошли, как {{ user.name }}</h3>
            </div>
            <div class="px-10">
                <h3 class="text-2xl">Количество доступных проектов: 10</h3>
            </div>
        </AuthorizedLayout>
    </BaseLayout>
</template>