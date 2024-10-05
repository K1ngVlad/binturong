<script setup lang="ts">
    import { computed } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import AuthorizedLayout from '@/Layouts/AuthorizedLayout.vue';

    const user = computed(() => usePage().props?.auth?.user);
</script>

<template>
    <BaseLayout>
        <AuthorizedLayout>
            <div class="p-10">
                <h3 class="text-2xl">{{ user?.name ? ('Вы вошли, как ' + user.name) : 'Вы не авторизованы' }}</h3>
            </div>
            <div class="px-10">
            </div>
        </AuthorizedLayout>
    </BaseLayout>
</template>