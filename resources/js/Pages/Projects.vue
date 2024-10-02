<script setup lang="ts">
    import { useForm } from '@inertiajs/vue3';
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import AuthorizedLayout from '@/Layouts/AuthorizedLayout.vue';
    import { onMounted, ref, VNodeRef } from 'vue';

    const props = defineProps<{
        projects: Array<any>,
        type: string
    }>();

    const form = useForm({
        category: 0,
        portfolio_year: false,
        archive: false,
        project_year: false,
        search: ''
    });

    const tableBody = ref<VNodeRef | null>(null);

    const submit = () => {
        form.post('/projects');
    }

    onMounted(() => {
        console.log(tableBody);
        if(tableBody.value) {
            console.log(tableBody.value);
        }
    });

    const titles = ["№", "Код", "Наименование", "Этап", "Приоритет", "% Реализации", "Общий статус", "Завершение по текущему плану", "Менеджер проекта", "Краткое описание"];
</script>

<template>
    <BaseLayout>
        <AuthorizedLayout>
            <form @submit.prevent="submit" class="flex p-3 h-24 bg-slate-200 justify-between">
                <div class="h-full flex flex-col justify-between">
                    <div>
                        <label>
                            <input v-model="form.portfolio_year" type="checkbox"/>
                            <span>Портфель проектов текущего года</span>
                        </label>
                        <label>
                            <input :checked="form.archive" type="checkbox"/>
                            <span>Архивные проекты</span>
                        </label>
                        <label>
                            <input :checked="form.project_year" type="checkbox"/>
                            <span>Проект портфеля текущего года</span>
                        </label>
                    </div>
                    <div class="flex items-end">
                        <button class="filter">Экспорт</button>
                        <div class="filter relative w-36">
                            Группировать
                            <div class="absolute top-0 left-0 w-full h-full z-10 pointer-events-none bg-slate-600 flex justify-center items-center">Группировать</div>
                            <select v-model="form.category" class="text-black absolute top-0 left-0 w-full h-full">
                                <option value="0">Предпроект</option>
                                <option value="1">Реализация</option>
                                <option value="2">Завершён</option>
                                <option value="3">Закрыт</option>
                                <option value="4">Отменён</option>
                                <option value="5">Приостановлен</option>
                                <option value="6">Инициация</option>
                                <option value="7">Заказчик проекта</option>
                                <option value="8">Время записи</option>
                            </select>
                        </div>
                        <label>
                            <span>Поиск: </span>
                            <input v-model="form.search"/>
                        </label>
                    </div>
                </div>
                <div class="flex h-full items-end">
                    <button type="button" class="filter">Этап</button>
                    <button type="button" class="filter">Категория</button>
                    <button type="button" class="filter">Заказчик</button>
                    <button type="button" class="filter">Сроки</button>
                    <button type="button" class="filter">Стоимость</button>
                    <button type="button" class="filter">Документация</button>
                </div>
            </form>
    <div class="scroll-table flex-grow flex flex-col">
	    <table>
		    <thead>
			    <tr>
				    <th v-for="(title, i) in titles" :key="i">{{ title }}</th>
			    </tr>
		    </thead>
	    </table>	
	<div class="scroll-table-body flex-grow relative">
		<table class="absolute">
			<tbody>
				<template v-if="type === 'base'">
                    <tr v-for="(project, i) in projects">
                        <td>{{ i }}</td>
                        <td>{{ project.code }}</td>
                        <td>{{ project.name }}</td>
                        <td>{{ project.stage }}</td>
                        <td>{{ project.priority }}</td>
                    </tr>
                </template>
			</tbody>
		</table>
	</div>	
</div>
        </AuthorizedLayout>
    </BaseLayout>
</template>

<style lang="css">
   .scroll-table-body {
	overflow-x: auto;
}
.scroll-table table {
	width:100%;
	table-layout: fixed;
}
.scroll-table thead th {
	font-weight: bold;
	text-align: left;
	padding: 10px 15px;
	background: #d8d8d8;
	font-size: 14px;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
}
.scroll-table tbody td {
	text-align: left;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
	padding: 10px 15px;
	font-size: 14px;
	vertical-align: top;
}
.scroll-table tbody tr:nth-child(even){
	background: #f3f3f3;
}
 
/* Стили для скролла */
::-webkit-scrollbar {
	width: 6px;
} 
::-webkit-scrollbar-track {
	box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
	box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
</style>