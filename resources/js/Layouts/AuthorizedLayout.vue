<script setup lang="ts">
    import Hero from '@/Components/Hero.vue';
    import Nav from '@/Components/Nav.vue';
</script>

<template>
    <Hero/>
    <Nav/>
    <section class="flex flex-grow flex-col">
        <slot></slot>
     </section>
</template>