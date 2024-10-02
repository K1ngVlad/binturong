<script setup lang="ts">
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import Button from '@/Components/Button.vue';
    import folderImgUrl from '../../assets/svg/folder.svg';
    import protfolioImgUrl from '../../assets/svg/portfolio.svg';
</script>

<template>
    <BaseLayout>
        <div class="flex items-center">
            <div>
                <img class="w-80" :src="folderImgUrl" alt="folder"/>
                <img class="w-80" :src="protfolioImgUrl" alt="protfolio"/>
            </div>
            <div>
                <h1 class="text-4xl text-orange-400 font-bold">Сервис ведения проектов: Код Согласия</h1>
                <p class="ml-10 mt-4 text-xl text-orange-600 font-bold">Средства для хранения и мониторинга текущих проектов</p>
                <div class="flex justify-end mt-6 mr-10">
                    <Button is-link :href="route('login')">Войти</Button>
                </div>     
            </div>
        </div>
    </BaseLayout>
</template>