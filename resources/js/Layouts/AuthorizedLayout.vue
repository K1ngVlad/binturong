<script setup lang="ts">
    import Hero from '@/Components/Hero.vue';
    import Nav from '@/Components/Nav.vue';
</script>

<template>
    <div>
        <Hero/>
        <Nav/>
        <slot></slot>
    </div>
</template>