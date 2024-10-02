<script setup lang="ts">
    import Header from '@/Components/Header.vue';
    import Footer from '@/Components/Footer.vue';

    defineProps<{
        notWidthLimit?: boolean
    }>();
</script>

<template>
    <div class="flex relative flex-col h-full">
        <Header/>
        <main class="bg-slate-100 grow flex justify-center">
            <div :class="'flex flex-col' + (notWidthLimit ? ' no-w-limit' : '')" id="container">
                <slot></slot>
            </div>
        </main>
        <Footer/>
    </div>
</template>

<style lang="css">
    #container {
        width: 100%;
        max-width: 1600px;
        min-height: 50px;
    }
    #container.no-w-limit {
        min-height: auto;
    }
</style>