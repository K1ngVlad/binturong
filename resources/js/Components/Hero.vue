<script setup lang="ts">
    import logoImgurl from '../../assets/logo-long.png';
    import backgroundUrl from '../../assets/background.jpg';

    const months = ["января", "февраля", "марта", "апреля", "майя", "июня", "июля", "августа", "сентября", "октября", "ноября", "декобря"];

    const weekDays = ["Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"];

    const getDate = ():string => {
        const date = new Date();
        const year = date.getFullYear();
        const month = date.getMonth();
        const day = date.getDate();
        const weekDay = date.getDay();

        return `${day} ${months[month]} ${year} г. ${weekDays[weekDay]}`;
    }
</script>

<template>
    <section :style="{backgroundImage: 'url(' + backgroundUrl + ')', backgroundSize: 'cover', objectFit: 'cover'}" class="flex p-4 h-28 text-orange-600">
        <div class="h-full">
            <img class="h-full" alt="logo" :src="logoImgurl"/>
        </div>
        <div class="flex grow flex-col h-full justify-between px-10 pt-2">
            <div class="flex w-full justify-between text-xl font-medium">
                <span>Хитрунов Владислав (Мафиозник)</span>
                <time>{{ getDate() }}</time>
            </div>
            <div class="text-center text-4xl font-bold"><h2>Портал проектного управления</h2></div>
        </div>
        <div></div>
    </section>
</template>

<style lang="css">
</style>