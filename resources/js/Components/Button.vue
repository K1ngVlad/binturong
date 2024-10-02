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
    <Link v-if="isLink && href" :href>
        <button :class="'bg-orange-400 text-white p-2 min-w-20 rounded-lg font-medium' + (className ? ' ' + className : '')" @click="onClick">      
            <slot></slot>       
        </button>
    </Link>
    <button v-else :class="'bg-orange-400 text-white p-2 min-w-20 rounded-lg font-medium' + (className ? ' ' + className : '')" @click="onClick">      
            <slot></slot>       
    </button>
</template>