<script setup lang="ts">
    import { useForm } from '@inertiajs/vue3';
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import AuthorizedLayout from '@/Layouts/AuthorizedLayout.vue';

    const form = useForm({
        category: 0
    });

    const submit = () => {}
</script>

<template>
    <BaseLayout>
        <AuthorizedLayout>
            <form @submit.prevent="submit" class="flex p-3 h-24 bg-slate-200 justify-between">
                <div class="h-full flex flex-col justify-between">
                    <div>
                        <label>
                            <input type="checkbox"/>
                            <span>Портфель проектов текущего года</span>
                        </label>
                        <label>
                            <input type="checkbox"/>
                            <span>Архивные проекты</span>
                        </label>
                        <label>
                            <input type="checkbox"/>
                            <span>Проект портфеля текущего года</span>
                        </label>
                    </div>
                    <div class="flex items-end">
                        <button class="filter">Экспорт</button>
                        <div class="filter relative w-36">
                            Группировать
                            <div class="absolute top-0 left-0 w-full h-full z-10 pointer-events-none bg-slate-600 flex justify-center items-center">Группировать</div>
                            <select :value="form.category" class="text-black absolute top-0 left-0 w-full h-full">
                                <option value="0">Предпроект</option>
                                <option value="0">Реализация</option>
                                <option value="0">Завершён</option>
                                <option value="0">Закрыт</option>
                                <option value="0">Отменён</option>
                                <option value="0">Приостановлен</option>
                                <option value="0">Инициация</option>
                                <option value="0">Заказчик проекта</option>
                                <option value="0">Время записи</option>
                            </select>
                        </div>
                        <label>
                            <span>Поиск: </span>
                            <input/>
                        </label>
                    </div>
                </div>
                <div class="flex h-full items-end">
                    <button class="filter">Общая информация</button>
                    <button class="filter">Состояние</button>
                    <button class="filter">Команда проекта</button>
                    <button class="filter">Сроки</button>
                    <button class="filter">Стоимость</button>
                    <button class="filter">Документация</button>
                </div>
            </form>
            <table class="flex-grow">
                <thead>
                    Привет
                </thead>
            </table>
        </AuthorizedLayout>
    </BaseLayout>
</template>

<style lang="css">
</style>