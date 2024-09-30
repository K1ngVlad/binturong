<script setup lang="ts">
    import { Link } from '@inertiajs/vue3';

    defineProps<{
        onClick?: () => void,
        isLink?: boolean,
        href?: string,
        className?: string
    }>()
</script>

<template>
    <button :class="'bg-orange-400 text-white p-2 min-w-20 rounded-lg font-medium' + (className ? ' ' + className : '')" @click="onClick">
        <Link v-if="isLink && href" :href>
            <slot></slot>
        </Link>
        <slot v-else></slot>
    </button>
</template>