<script setup lang="js">
    import { useForm } from '@inertiajs/vue3';
    import Button from '@/Components/Button.vue';
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import AuthorizedLayout from '@/Layouts/AuthorizedLayout.vue';
    import AdminLayout from '@/Layouts/AdminLayout.vue';
    import { ref } from 'vue';

    const form = useForm({
      table: null,
    })

    const submit = () => {
        if(!form.table) return;
        form.post('/import');
    }

    const isDragging = ref(false);

    const dragover = () => {
        isDragging.value = true;
    }

    const dragleave = () => {
        isDragging.value = false;
    }

    const drop = () => {
        isDragging.value = false;
    }
</script>

<template>
    <BaseLayout>
        <AuthorizedLayout> 
            <AdminLayout>
                <form @submit.prevent="submit">
                    <div @drop="drop" @dragover="dragover" @dragleave="dragleave" class="dropContainer">
                        <label for="fileInput" class="file-label">
                            <div v-if="isDragging">Отпустите файл</div>
                            <div v-else>Перенесите сюда файл или <u>кликните здесь</u> для загрузки.</div>
                        </label>
                        <input class="dropInput" name="file" type="file" accept=".xls,.xlsx" @input="form.table = $event.target.files[0]"/>
                    </div>
                    <div>Прикреплённый файл: {{ form.table?.name }}</div>
                    <Button>Отправить</Button>
                     <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                </form>
            </AdminLayout>
        </AuthorizedLayout>
    </BaseLayout>
</template>

<style>
    .dropContainer{
        width: 300px;
        height: 300px;
        background-color: white;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .dropInput {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        cursor: pointer;
        opacity: 0;
        font-weight: medium;
    }
</style>