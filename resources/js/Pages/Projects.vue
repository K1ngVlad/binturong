<script setup lang="ts">
    import { useForm } from '@inertiajs/vue3';
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import AuthorizedLayout from '@/Layouts/AuthorizedLayout.vue';
    import { computed, onMounted, ref, VNodeRef } from 'vue';

    const props = defineProps<{
        projects: Array<any>,
        type: string
    }>();

    console.log(props);

    const form = useForm({
        category: 0,
        portfolio_year: false,
        archive: false,
        project_year: false,
        search: ''
    });

    const tableBody = ref<VNodeRef | null>(null);

    const category = ref<number>(0);

    const submit = () => {
        form.post('/projects');
    }

    onMounted(() => {
        console.log(tableBody);
        if(tableBody.value) {
            console.log(tableBody.value);
        }
    });

    const titles = ["№", "Код", "Наименование", "Этап", "Направление деятельности", "Программа", "R/G/T", "Краткое описание", "Бизнес-цели проекта", "% реалзиации", "Бизнес-цели", "Сроки", "Бюджет", "Содержание", "Ссылка на отчёт", "Заказчик", "Руководитель проекта", "ТимЛид", "Бизнес аналитик", "Состав УК", "Текущие сроки проекта", "Базовые сроки проекта", "Год реализации", "Год завершения реализации" ];

    const subTitles = {
        20: ['Начало', 'Завершение', 'Длительность'],
        21: ['Завершение', 'Отклонение']
    };

    const fieldNames = ['_', 'code', 'name', 'stage', 'area_of_activity', 'program', 'r_g_t', 'short_description',  'project_goal', 'project_state', 'project_state', 'project_state', 'project_state', 'project_state', 'project_state', 'project_organizational_structure', 'project_organizational_structure', 'project_organizational_structure', 'project_organizational_structure', 'project_organizational_structure', 'project_term', 'project_term', 'project_term', 'project_term'];

    const subFiledNames = {
        8: 'business_goals',
        9: 'sales_percentages',
        10: 'business_goals',
        11: 'terms',
        12: 'budeget',
        13: 'content',
        14: 'link_to_report',
        15: 'client',
        16: 'project_manager',
        17: 'team_leader',
        18: 'business_analyst',
        19: 'composition_of_the_uk',
        20: 'current_actual_terms',
        21: 'basic_terms',
        22: 'terms_according_to_passport',
        23: 'terms_according_to_passport'
    };

    const subSubFieldNames = {
        8: 'business_goals',
        20: ['start', 'completion', 'duration'],
        21: ['completion', 'deviation'],
        22: 'year_of_start',
        23: 'year_of_completion'
    };

    const baseFields = [1, 2, 3];

    const fields = [
        [4, 5, 6, 7, 8],
        [9, 10, 11, 12, 13, 14],
        [15, 16, 17, 18, 19],
        [20, 21, 22, 23]
    ];

    const currentTitles = computed(() => {
        const fieldsItem = fields[category.value];
        const baseTitles:Array<any> = baseFields.map(field => [titles[field], []]);
        const extraTitles = fieldsItem.map(field => {
            
            if(subTitles.hasOwnProperty(field)) {
                const subTitlesItem = subTitles[field as keyof typeof subTitles];
                return [titles[field], subTitlesItem];
            }
            
            return [titles[field], []];
        });

        return baseTitles.concat(extraTitles);
    });

    const fieldValues = computed(() => {
        const baseNames = baseFields.map(field => fieldNames[field]);
        const baseValues = props.projects.map(project => baseNames.map(name => project[name]));

        const fieldsItem = fields[category.value];

        const extraNames = fieldsItem.map(field => fieldNames[field]);
        
        const fullFields = props.projects.map((project, i) => ({ id: project.id, values: baseValues[i].concat(extraNames.map((name, i) => {
            const projectDivision = project[name];
            const fieldIndex = fieldsItem[i];
            if(typeof projectDivision === 'string') {
                return projectDivision;
            }
            else if(projectDivision === null) {
                return '';
            }
            else if(typeof projectDivision === 'object') {
                if(subFiledNames.hasOwnProperty(fieldIndex)) {
                    const subFiledName = subFiledNames[fieldIndex as keyof typeof subFiledNames];
                    if(projectDivision.hasOwnProperty(subFiledName)) {
                        const subValue = projectDivision[subFiledName];
                        if(typeof subValue !== "string") return '';
                        if(subSubFieldNames.hasOwnProperty(fieldIndex)) {
                            const subData = JSON.parse(subValue);
                            if(!subData) return '';
                            const subSubFieldName = subSubFieldNames[fieldIndex as keyof typeof subSubFieldNames];
                            if(typeof subSubFieldName === "string") {
                                return subData[subSubFieldName];
                            }
                            else if(Array.isArray(subSubFieldName)) {
                                return subSubFieldName.map(name => subData[name]);
                            }
                        }
                        else {
                            return subValue;
                        }
                    }
                }
            }
            return '';
        }))}));
        return fullFields;
    });
    
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
                            <input v-model="form.archive" type="checkbox"/>
                            <span>Архивные проекты</span>
                        </label>
                        <label>
                            <input v-model="form.project_year" type="checkbox"/>
                            <span>Проект портфеля текущего года</span>
                        </label>
                    </div>
                    <div class="flex items-end">
                        <button class="filter">Экспорт</button>
                        <div class="filter relative w-36">
                            Группировать
                            <div class="absolute top-0 left-0 w-full h-full z-10 pointer-events-none bg-slate-600 flex justify-center items-center">Группировать</div>
                            <select v-model="form.category" class="text-black absolute top-0 left-0 w-full h-full">
                                <option value="0">Этап</option>
                                <option value="1">Категория</option>
                                <option value="3">Заказчик</option>
                            </select>
                        </div>
                        <label>
                            <span>Поиск: </span>
                            <input v-model="form.search"/>
                        </label>
                    </div>
                </div>
                <div class="flex h-full items-end">
                    <button @click.left="category = 0" type="button" class="filter" :style="category === 0 ? 'background-color: tomato' : ''">Общая информация</button>
                    <button @click.left="category = 1" type="button" class="filter" :style="category === 1 ? 'background-color: tomato' : ''">Состояние</button>
                    <button @click.left="category = 2" type="button" class="filter" :style="category === 2 ? 'background-color: tomato' : ''">Команда проекта</button>
                    <button @click.left="category = 3" type="button" class="filter" :style="category === 3 ? 'background-color: tomato' : ''">Сроки</button>
                    <button @click.left="category = 4" type="button" class="filter" :style="category === 4 ? 'background-color: tomato' : ''">Стоимость</button>
                    <button @click.left="category = 5" type="button" class="filter" :style="category === 5 ? 'background-color: tomato' : ''">Документация</button>
                </div>
            </form>
    <div class="scroll-table flex-grow flex flex-col">
	    <table>
		    <thead>
			    <tr>
                    <th rowspan="2">№</th>
                    <template  v-for="(title, i) in currentTitles" :key="i">
                        <th :title="title[0]" :rowspan="title[1].length ? 1 : 2" :colspan="title[1].length ? title[1].length : 1">{{ title[0] }}</th>
                    </template>
			    </tr>
                <tr>
                    <template  v-for="(title, i) in currentTitles" :key="i">
                        <th v-for="(subTitle, i) in title[1]" :key="i" :title="subTitle">{{ subTitle }}</th>
                    </template>   
                </tr>
		    </thead>
	    </table>	
	<div class="scroll-table-body flex-grow relative">
		<table class="absolute">
			<tbody>
				<template v-if="type === 'base'">
                    <tr v-for="({id, values}, i) in fieldValues" :key="id">
                        <td>{{ i }}</td>
                        <template v-for="(value, i) in values" :key="i">
                            <template v-if="Array.isArray(value)">
                                <td v-for="(subValue, i) in value" :key="i" :title="subValue">{{ subValue }}</td>
                            </template>
                            <td v-else :title="value">{{ value }}</td>
                        </template>
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
    white-space: nowrap;
    overflow:hidden;
    text-overflow: ellipsis;
}
.scroll-table tbody td {
	text-align: left;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
	padding: 10px 15px;
	font-size: 14px;
	vertical-align: top;
    overflow:hidden;
    text-overflow: ellipsis; 
    white-space:nowrap;
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